<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
    <script href="bootstrap/js/bootstrap.js" rel="stylesheet"></script>
    <script href="bootstrap/js/jquery.js" rel="stylesheet"></script>
    <title>Forms</title>
</head>
<body>
<div class="m-auto jumbotron" style="width: 70%; height: 70%;">
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

        <div class="form-group">
            <label for="sample_text">Sample Text:</label>
            <input type="text" name="sample_text" id="sample_text" placehold="Sample Text" autofocus class="form-control">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            <input type="submit" name="reset" value="Reset" class="btn btn-primary">
        </div>
    </form>

    <?php
        if (!isset($_POST["reset"])){
            echo '<hr class="my-4">';
            echo '<ol class="list-group list-group-flush">';
            foreach ($_POST as $key => $item) {
                if ($key == "reset" || $item == "" || $key == "submit") continue;
                echo '<li class="list-group-item">' . $item . "</li>";
            }
            echo "</ol>";
        }


    ?>
    <hr class="my-4">
    <h2 class="display-4">BOTTOM TEXT</h2>
</div>
</body>
</html>