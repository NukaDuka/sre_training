<?php 
// if session cookie exists, validate it with redis
// if it is correct, redirect to content automatically
session_start();
$_SESSION['src'] = 'new';
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
    <script>
        var check = function() {
            if (document.getElementById('passwd').value ==
                document.getElementById('cpasswd').value) {
                document.getElementById('submit').disabled = false
                document.getElementById('form').classname = "needs-validation"
            } else {
                document.getElementById('submit').disabled = false
                document.getElementById('form').classname = "was-validated"
            }
        }
    </script>
    <title>TOP SECRET login</title> 
</head>
<body>
    <div class="w-100 h-100 d-flex justify-content-center align-items-center flex-fill-1">
        <div class="jumbotron">
            <h2 class="text-center">Create new account</h2>
            <hr class="my-4">
            <!-- TODO: Learn how to use TLS ;-; -->
            <form id="form" action="validate.php" method="post" class="needs-validation">
                <div class="form-group row">
                    <label for="uname" class="col-sm-3 col-form-label">Username: </label>
                    <div class="col-sm-9">
                        <input type="text" id="uname" name="uname" class="form-control" placeholder="Username" required autofocus>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwd" class="col-sm-3 col-form-label">Password: </label>
                    <div class="col-sm-9">
                        <input type="password" id="passwd" name="passwd" class="form-control" onchange="check()" placeholder="Password" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwd" class="col-sm-3 col-form-label">Retype password: </label>
                    <div class="col-sm-9">
                        <input type="password" id="cpasswd" name="cpasswd" class="form-control" onchange="check()" placeholder="Password" autocomplete="off" required>
                    </div>
                </div>
               <button type="submit" name="submit" id="submit" class="btn btn-primary">Sign in</button>
            </form>
            
        </div>
    </div>
</body>
</html>
