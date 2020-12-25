<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>Forms</title>
</head>
<body>
<div class="d-flex justify-content-md-center align-items-center vh-100">
    <div>
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
</div>
</body>
</html>