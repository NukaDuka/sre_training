<?php
session_start();
if (isset($_COOKIE['ts_auth']))
{
    $cookie = $_COOKIE['ts_auth'];
    $redis = new Redis();
    $redis->connect('redis', 6379, 1, NULL, 0, 0, ['auth' => ['ts-redis', 'dGVzdHBhc3N3ZAo']]);
    $key = $redis->get('ts_admin:token_key');
    $iv = $redis->get('ts_admin:iv');
    $message = openssl_decrypt($cookie, 'AES-128-CTR', $key, 0, $iv);
    $json_message = json_decode($message);
    if (!hash_equals($json_message->token, $redis->get('ts:' . $json_message->uname))){
        setcookie('ts_auth', "", time() - 3600);
        header('Location: /php_tut/code/top-secret-login-page/index.php');
        exit();
    }
}
else 
{
    header('Location: /php_tut/code/top-secret-login-page/index.php');
    exit();
}
session_destroy();
?>
<iframe src="https://player.vimeo.com/video/148751763" width="640" height="480" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
