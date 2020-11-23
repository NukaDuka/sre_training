<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forms</title>
</head>
<body>
<form action="form.php" method="post" autocomplete="off">
    <?php
        $n = 1;
        if (!isset($_POST["reset"])) {
            foreach ($_POST as $key => $item) {
                if ($key == "reset" || $item == "" || $key == "submit") continue;
                echo '<input type="hidden" name="' . $n . '" value="' . $item . '">';
                $n++;
            }
        }
    ?>
    <input type="text" name="sample_text" id="sample_text" placehold="Sample Text" autofocus><br>
    <input type="submit" name="submit" value="Submit">
    <input type="submit" name="reset" value="reset">
</form>

<?php
    if (!isset($_POST["reset"])){
        echo "<hr>";
        echo "<ol>";
        foreach ($_POST as $key => $item) {
            if ($key == "reset" || $item == "" || $key == "submit") continue;
            echo "<h3><li>" . $item . "</li></h3>";
        }
        echo "</ol>";
    }


?>
<hr>
<h2>BOTTOM TEXT</h2>
</body>
</html>