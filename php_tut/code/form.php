<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
<?php $a = []; ?>
<form action="form.php" method="post">
    <?php
        $n = 1;
        foreach ($_POST as $item) {
            echo '<input type="hidden" name="' . $n . '" value="' . $item . '">';
        }
    ?>
    <input type="text" name="sample_text" id="sample_text" placehold="Sample Text"><br>
    <input type="submit" value="Submit">
</form>
<hr>
<?php

    foreach ($_POST as $item) {
        echo $item . "<br>";
        array_push($a, $item);
    }

?>
<hr>
<h2>BOTTOM TEXT</h2>
</body>
</html>