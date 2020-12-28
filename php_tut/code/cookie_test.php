<?php
header("Cache-Control: no-cache");
if (!isset($_COOKIE['sessionID'])){
    $token = md5(strval(microtime()));
    $token_header = "Set-Cookie: sessionID=" . $token . "; Max-age=120";
    header($token_header);
    echo "<h1>Welcome new user!</h1>";
    echo "<h3>Your token number is " . $token . "</h3>";
}
else {
    $token = $_COOKIE['sessionID'];
    echo "<h1>Welcome back, user!</h1>";
    echo "<h3>Your token number is " . $token . "</h3>";
}
print_r($_COOKIE);

echo "<br>" . $token;
?>