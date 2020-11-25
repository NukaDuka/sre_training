<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
    <script href="bootstrap/js/bootstrap.js" rel="stylesheet"></script>
    <script href="bootstrap/js/jquery.js" rel="stylesheet"></script>
    <title>the void</title>
</head>
<body>
    <div class="d-flex justify-content-md-center align-items-center vh-100 bg-danger">
    <div>
        <?php
            if (isset($_POST["input"]) && $_POST["input"] != "") {
                echo '<h3 class="display-4 text-white"> Your message was: "' . $_POST["input"] . '"</h3>';
                echo '<h1 class="display-4 text-white">THE VOID SAYS HELLO, AND ENJOY YOUR STAY!</h1>';
            }
            else {
                echo '<h3 class="display-4 text-white">YOU HAVE SAID NOTHING!</h3>';
                echo '<h1 class="display-4 text-white">NEVERTHELESS, THE VOID SAYS HELLO, AND ENJOY YOUR STAY!</h1>';
            }
        ?>
    </div>
    </div>
</body>
</html>