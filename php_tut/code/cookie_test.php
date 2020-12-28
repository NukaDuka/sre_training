<?php
header("Cache-Control: no-cache");
print_r($_COOKIE);
$token = md5(strval(microtime()));
echo "<br>" . $token;
?>