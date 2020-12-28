<?php
header("Cache-Control: no-cache");
print_r(getallheaders()['Cookie']);

$token = md5(strval(microtime()));
echo $token;
?>