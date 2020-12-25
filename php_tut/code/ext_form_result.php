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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
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