<?php 
session_start();
$redis = new Redis();
$redis->connect('redis', 6379, 1, NULL, 0, 0, ['auth' => ['ts-redis', 'dGVzdHBhc3N3ZAo']]);
if (!$redis->ping()) http_response_code(500);
$key = $redis->get('ts_admin:token_key');
$_SESSION['key'] = $key;
$token = hash('sha256', uniqid(session_id(), true));
$cookie = hash_hmac('sha256', json_encode(array("uname"=>$_POST['uname'], "token"=>$token)), $key);

$_SESSION['cook'] = $cookie;
if (!isset($_POST['submit'])) {
    header('Location: /php_tut/code/top-secret-login-page/index.php');
    exit();
}
$conn = new mysqli("mariadb", "ts_login", "o0RIeqP9TKn8iHfR", "ts_auth");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
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

$processed_passwd = hash('sha256', $_POST['passwd']);
if ($processed_passwd == $passwd_enc)
{
    //redirect to content
    //create cookie 
    $redis = new Redis();
    $redis->connect('redis', 6379, 1, NULL, 0, 0, ['auth' => ['ts-redis', 'dGVzdHBhc3N3ZAo']]);
    if (!$redis->ping()) http_response_code(500);
    $_SESSION['key'] =  $redis->get('ts_admin:token_key');
    $token = hash('sha256', uniqid(session_id(), true));
    $cookie = hash_hmac('sha256', json_encode(array("uname"=>$_POST['uname'], "token"=>$token)), $key);
    
    //setcookie('ts_auth')
    //upload cookie to redis depending on checkbox value
}
else
{
    echo -1;
    //redirect to index with error messg
}
$stmt->close();
$conn->close();
?>