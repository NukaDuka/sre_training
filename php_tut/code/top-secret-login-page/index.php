<?php 
# dG9wX3NlY3JldF9zaGl0Cg== db
# add code for encrypting password and sending it
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=devy-4i>ce-width, initial-scale=1.0">
    <style>
        html, body {
            height: 100vh;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>TOP SECRET login</title> 
</head>
<body>
    <div class="w-100 h-100 d-flex justify-content-center align-items-center flex-fill-1">
        <div class="jumbotron">
            <h2 class="text-center">Login</h2>
            <h5 class="text-center"><small class="muted">Only employees holding class-A permits can access this repository</small></h5>
            <hr class="my-4">
            <form action="index.php" method="post">
                <div class="form-group row">
                    <label for="uname" class="col-sm-3 col-form-label">Username: </label>
                    <div class="col-sm-9">
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwd" class="col-sm-3 col-form-label">Password: </label>
                    <div class="col-sm-9">
                        <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="persist">
                        <label class="form-check-label" for="persist">
                            Keep me logged in
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>