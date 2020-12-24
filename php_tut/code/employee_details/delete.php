<?php
    function redirect($location) {
        $header_str = "Location: " . $location;
        header($header_str); 
        exit();
    }

    if (!isset($_GET['empID']) && !isset($_POST['yes'])) {
        redirect("/php_tut/code/employee_details/get.php");
    }

    $id = $_GET['empID'];
    $con = mysqli_connect("mariadb", "employee_php", "ZW1wbG95ZWVfdGFibGUK", "employee");
    if ($con) {
        $query = mysqli_prepare($con, "select * from employees where id = ?");
        mysqli_stmt_bind_param($query, 's', $id);
        if (!mysqli_stmt_execute($query)) {
            $success = false;  
        }
        mysqli_stmt_bind_result($query, $id, $name, $pos);
        mysqli_stmt_fetch($query);
        mysqli_stmt_close($query);
    }

?>
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
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
          margin-bottom: 0;
          border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 100%}

        .sidenav {
          padding-top: 20px;
          background-color: #f1f1f1;
          height: 100%;
        }

        footer {
          background-color: #555;
          color: white;
          padding: 15px;
        }

        @media screen and (max-width: 767px) {
          .sidenav {
            height: auto;
            padding: 15px;
          }
          .row.content {height:auto;}
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <title>Employee details homepage</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
        <a class="navbar-brand" href="index.html">Employee details page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.html">Home</a></li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="enter.php">Enter details</a></li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="get.php">Get details</a></li>
                </li>
            </ul>
        </div>
    </nav>
    <br>
    <div class="container-fluid text-center">
        <div class="row content">
            <div class="col-sm-2 sidenav">
                <div class="jumbotron bg-danger">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-danger">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-danger">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-danger">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-danger">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-danger">
                    <p>INTRUSIVE ADS</p>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="text-left"><h1>Delete employee record</h1></div>
                <hr>
                <h3>Are you sure you want to delete the following record?</h3>
                <div class="container">
                    <div class="row justify-content-center">
                        <ul class="list-group">
                            <li class="list-group-item">Employee ID: <?php echo $id ?></li>
                            <li class="list-group-item">Employee name: <?php echo $name ?></li>
                            <li class="list-group-item">Position: <?php echo $pos ?></li>
                        </ul>
                    </div>   
                    <div class="row justify-content-center mt-3">
                        <div class="col-sm-2">
                            <input type="submit" class="btn btn-danger" id="no" name="no" value="No">
                            <input type="submit" class="btn btn-dark" id="yes" name="yes" value="Yes">
                        </div>
                    </div>                     
                </div>
                
            </div>
            <div class="col-sm-2 sidenav">
                <div class="jumbotron bg-warning">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-warning">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-warning">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-warning">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-warning">
                    <p>INTRUSIVE ADS</p>
                </div>
                <div class="jumbotron bg-warning">
                    <p>INTRUSIVE ADS</p>
                </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid text-center">
        <p>Copyright &copy; 2020 ROFL Inc. All rights reserved</p>
    </footer>
</body>
</html>