<?php 
// if session cookie exists, validate it with redis
// if it is correct, redirect to content automatically
session_start();
if (isset($_COOKIE['ts_auth']))
{
    $cookie = $_COOKIE['ts_auth'];
    echo $cookie;
}
session_destroy();
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
            <h2 class="text-center">Secure login</h2>
            <h5 class="text-center"><small class="muted">Only employees holding class-A permits can log in</small></h5>
            <hr class="my-4">
            <?php 
            if (isset($_SESSION['unauth']) && $_SESSION['unauth'] == true) echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><p class="text-center">Invalid username or password. Please try again.</p></div>';
            ?>
            <!-- TODO: Learn how to use TLS ;-; -->
            <form action="validate.php" method="post">
                <div class="form-group row">
                    <label for="uname" class="col-sm-3 col-form-label">Username: </label>
                    <div class="col-sm-9">
                        <?php
                        if (isset($_SESSION['unauth']) && $_SESSION['unauth'] == true) {
                            echo '<input type="text" id="uname" name="uname" class="form-control" placeholder="Username" value="' . $_SESSION['uname'] . '" onfocus="this.select()" required autofocus>';
                        } else {
                            echo '<input type="text" id="uname" name="uname" class="form-control" placeholder="Username" onfocus="this.select()" required autofocus>';
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="passwd" class="col-sm-3 col-form-label">Password: </label>
                    <div class="col-sm-9">
                        <input type="password" id="passwd" name="passwd" class="form-control" placeholder="Password" autocomplete="off" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-9">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="persist" id="persist" name="persist">
                            <label class="form-check-label" for="persist">Keep me logged in</label>
                        </div>
                    </div>
                </div>
                <button type="submit" name="submit" id="submit" class="btn btn-primary">Sign in</button> <a class="btn btn-light" href="new.php">Create new account</a>
            </form>
            
        </div>
    </div>
</body>
</html>
<?php
$_SESSION['unauth'] = false;
$_SESSION['uname'] = "";
?>