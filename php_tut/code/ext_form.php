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
    <title>Cool form B)</title>
</head>
<body>
    <div class="d-flex justify-content-md-center align-items-center vh-100">
        <div>
            <h3 class="display-4">Send a message to the abyss!</h3>
            <hr class="my-4">
            <form action="ext_form_result.php" method="post" autocomplete="off">
                <div class="form-group">
                    <label for="input">Enter message:</label>
                    <input type="text" name="input" id="input" placehold="input" autofocus class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Send a message to the void" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>