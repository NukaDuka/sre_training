<?php
session_start();
if (!isset($_POST['submit'])) {
    header('Location: /php_tut/code/top-secret-login-page/new.php');
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

if ($i != 0)
{
    $_SESSION['exists'] = true; 
    header('Location: /php_tut/code/top-secret-login-page/new.php');
    exit();
}

$processed_passwd = hash('sha256', $_POST['passwd']);


?>