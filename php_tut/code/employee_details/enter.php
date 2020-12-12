<?php 

    $id = trim($_POST['empID']);
    $name = trim($_POST['empName']);
    $pos = trim($_POST['empPos']);
    $con = mysqli_connect("mariadb", "employee_php", "ZW1wbG95ZWVfdGFibGUK", "employee");
    if ($con) {
        if (isset($_POST['submit'])) {
            $query = mysqli_prepare($con, "insert into employees values (?, ?, ?)");
            mysqli_stmt_bind_param($query, 'sss', $id, $name, $pos);
            if (!mysqli_stmt_execute($query)) {
                $success = false;  
            }
            mysqli_stmt_close($query);
        }   
    }
    else {
        echo "Error: " . mysqli_connect_error();
    }
    mysqli_close($con);
    $header_str = "Location: /get.php?redirect=true&empID=" . $id;
    header($header_str); 
    exit();
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

        /* Set gray background color and 100% height */
        .sidenav {
          padding-top: 20px;
          background-color: #f1f1f1;
          height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
          background-color: #555;
          color: white;
          padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
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
    <title>Enter employee details</title>
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
            <div class="col-sm-8 text-left">
                <h1>Enter employee details</h1>
                <hr>
                <form action="enter.php" method="post" autocomplete="off">
                    <div class="form-group row">
                        <label for="empID" class="col-sm-2 col-form-label">Employee ID: </label>
                        <div class="col-sm-10"><input type="text" id="empID" name="empID" placeholder="1234" class="form-control" autofocus required></div>
                    </div>
                    <div class="form-group row">
                        <label for="empName" class="col-sm-2 col-form-label">Employee Name: </label>
                        <div class="col-sm-10"><input type="text" id="empName" name="empName" placeholder="John Smith" class="form-control" required></div>
                    </div>
                    <div class="form-group row">
                        <label for="empPos" class="col-sm-2 col-form-label">Position: </label>
                        <div class="col-sm-10"><input type="text" id="empPos" name="empPos" placeholder="Marketing" class="form-control" required></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" name="submit" class="btn btn-dark">
                        </div>
                    </div>
                </form>
                <br>
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