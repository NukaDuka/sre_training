<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>

<form action="form.php" method="post">
    <input type="text" name="sample_text" id="sample_text" placehold="Sample Text"><br>
    <input type="submit" value="Submit">
</form>

<?php

    echo $_POST;

?>
</body>
</html>