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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick Astley's masterpiece was not playable through an embed :(</title>
    <style>
    html, body {
        height: 100%;
    }
    </style>
</head>
<body>
    <iframe width="100%" height="90%" src="https://www.youtube.com/embed/mKue4WuagL8?autoplay=1&mute=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        <a href="php_tut/code/top-secret-login-page/logout.php" class="btn btn-light">Logout</a>
    </div>
</body>
</html>
