<?php 
session_start();
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
    die($i);
}

$redis = new Redis();
$redis->connect('redis', 6379, 1, NULL, 0, 0, ['auth' => ['ts-redis', 'dGVzdHBhc3N3ZAo']]);
$key = $redis->get('ts_admin:token_key');
$iv = $redis->get('ts_admin:iv');
$stmt->close();
$conn->close();
if (password_verify($_POST['passwd'], $passwd_enc))
{
    $token = hash('sha256', uniqid(session_id(), true));
    $cookie = openssl_encrypt(json_encode(array("uname"=>$_POST['uname'], "token"=>$token)), "AES-128-CTR", $key, 0, $iv);
    $cookie_time = isset($_POST['persist']) ? 86400 : 1200;
    $redis->del('ts:' . $_POST['uname']);
    setcookie('ts_auth', $cookie, time() + $cookie_time, '/php_tut/code/top-secret-login-page');
    $redis->set('ts:' . $_POST['uname'], $token, $cookie_time);
    $redis->close();
    header('Location: /php_tut/code/top-secret-login-page/content.php');
    exit();
}
else
{
    $_SESSION['unauth'] = true; 
    $_SESSION['uname'] = $_POST['uname'];
    $redis->close();
    header('Location: /php_tut/code/top-secret-login-page/index.php');
    exit();
}


?>