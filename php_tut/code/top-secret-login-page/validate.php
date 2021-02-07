<?php 
session_start();
$redis = new Redis();
$redis->connect('redis', 6379, 1, NULL, 0, 0, ['auth' => ['ts-redis', 'dGVzdHBhc3N3ZAo']]);
$key = $redis->get('ts_admin:token_key');
$iv = $redis->get('ts_admin:iv');
$_SESSION['key'] = $key;
$_SESSION['iv'] = $iv;

$token = hash('sha256', uniqid(session_id(), true));
$cookie = openssl_encrypt(json_encode(array("uname"=>$_POST['uname'], "token"=>$token)), "AES-128-CTR", $key, 0, $iv);
$_SESSION['cook'] = $cookie;


if (!isset($_POST['submit'])) {
    header('Location: /php_tut/code/top-secret-login-page/index.php');
    exit();
}
$conn = new mysqli("mariadb", "ts_login", "o0RIeqP9TKn8iHfR", "ts_auth");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$passwd_enc = "";
$stmt = $conn->prepare("select uid, uname, passwd from auth where uname=?");
$stmt->bind_param("s", $_POST['uname']);
$stmt->execute();
$stmt->bind_result($uid, $uname, $passwd_enc);
$i = 0;

while ($stmt->fetch())
{
    $i++;
}
if ($i == 0)
{
    $_SESSION['unauth'] = true; 
    $_SESSION['uname'] = $_POST['uname'];
    header('Location: /php_tut/code/top-secret-login-page/index.php');
    exit();
}
else if ($i > 1)
{
    //username cannot exist more than once, ensure it in new.php
    die($i);
}

$redis = new Redis();
$redis->connect('redis', 6379, 1, NULL, 0, 0, ['auth' => ['ts-redis', 'dGVzdHBhc3N3ZAo']]);
$key = $redis->get('ts_admin:token_key');
$iv = $redis->get('ts_admin:iv');
if (password_verify($_POST['passwd'], $passwd_enc))
{
    //redirect to content
    //create cookie 
    
    $token = hash('sha256', uniqid(session_id(), true));
    $cookie = openssl_encrypt(json_encode(array("uname"=>$_POST['uname'], "token"=>$token)), "AES-128-CTR", $key, 0, $iv);
    $cookie_time = isset($_POST['persist']) ? 86400 : 1200;
    $redis->del('ts:' . $_POST['uname']);
setcookie('ts_auth', $cookie, time() + $cookie_time, '/php_tut/code/top-secret-login-page'/*, ['secure' => true, 'httponly' => true, 'samesite' => 'None',]*/);
    $redis->set('ts:' . $_POST['uname'], $token, $cookie_time);
    header('Location: /php_tut/code/top-secret-login-page/content.php');
    exit();
}
else
{
    $_SESSION['unauth'] = true; 
    $_SESSION['uname'] = $_POST['uname'];
    header('Location: /php_tut/code/top-secret-login-page/index.php');
    exit();
}
$stmt->close();
$conn->close();

?>