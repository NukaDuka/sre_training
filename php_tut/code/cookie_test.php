<?php
print_r(getallheaders());
header("Cache-Control: no-cache");
$token = md5(strval(microtime()));
echo $token;
?>