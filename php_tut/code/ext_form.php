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
                    <input type="text" name="input" id="input" placehold="input" autofocus class="form-control" minlength="1">
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Send a message to the void" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>