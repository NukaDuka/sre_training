<?php
if (!isset($_COOKIE['ts_auth']))
{
    header('Location: /php_tut/code/top-secret-login-page/index.php');
    exit();
}
$redis = new Redis();
$redis->connect('redis', 6379, 1, NULL, 0, 0, ['auth' => ['ts-redis', 'dGVzdHBhc3N3ZAo']]);
$cookie = $_COOKIE['ts_auth'];
$message = openssl_decrypt($cookie, 'AES-128-CTR', $key, 0, $iv);
$json_message = json_decode($message);
if (!hash_equals($json_message->token, $redis->get('ts:' . $json_message->uname))){
    setcookie('ts_auth', "", time() - 3600);
    $redis->del("ts:" . $json_message->uname);
}
header('Location: /php_tut/code/top-secret-login-page/index.php');
exit();
?>