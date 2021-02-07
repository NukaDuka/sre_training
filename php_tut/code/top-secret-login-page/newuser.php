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
if (!$stmt->execute()) http_response_code(500);
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
$stmt->close();

$processed_passwd = password_hash($_POST['passwd'], PASSWORD_DEFAULT);
$stmt = $conn->prepare("insert into auth (uid, uname, passwd) values (NULL, ?, ?)");
$stmt->bind_param("ss", $_POST['uname'], $processed_passwd);
if (!$stmt->execute()) http_response_code(500);
$stmt->close();
$conn->close();

header('Location: /php_tut/code/top-secret-login-page/index.php');
exit();
?>