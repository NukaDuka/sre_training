<?php 

function redirect($location) {
    $header_str = "Location: " . $location;
    header($header_str); 
    exit();
}
print_r($_POST);
if (!isset($_GET['empID']) && !isset($_POST['submit'])) {
    redirect("/php_tut/code/employee_details/get.php");
}
if (isset($_POST["submit"])) {
    $id = $_POST['empID'];
    $pos = $_POST['empPos'];
    $name = $_POST['empName'];

    $con = mysqli_connect("mariadb", "employee_php", "ZW1wbG95ZWVfdGFibGUK", "employee");
    if (!$con) {
        redirect("/php_tut/code/employee_details/error.php");
    }
    $query_string = "update employees set ";
    if ($_POST['empName'] != ""){
        $query_string .= 'name=?';
    }
    if ($_POST['empName'] != "" && $_POST['empPos'] != "") $query_string .= ", ";
    if ($_POST['empPos'] != ""){
        $query_string .= "pos=?";
    }
    $redir_str = "/php_tut/code/employee_details/get.php?redirect=true&empID=" . $id;
    if ($_POST['empName'] == "" && $_POST['empPos'] == "") {
        mysqli_close($con);
        redirect($redir_str);
    }
    $query_string .= " where id=?";
    $query = mysqli_prepare($con, $query_string);
    if ($_POST['empName'] != "") mysqli_stmt_bind_param($query, 'ss', $id, $name);
    else if ($_POST['empPos'] != "") mysqli_stmt_bind_param($query, 'ss', $id,  $pos);
    else if ($_POST['empName'] != "" && $_POST['empPos'] != "") mysqli_stmt_bind_param($query, 'sss', $id,  $name, $pos);
    else{
        
    }

    if (!mysqli_stmt_execute($query)) {
        redirect("/php_tut/code/employee_details/error.php");
    }
    mysqli_stmt_close($query);
    mysqli_close($con);

    redirect($redir_str);
}
$success = true;
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
else {
    echo "Error: " . mysqli_connect_error();
}
mysqli_close($con);

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
            <div class="col-sm-8 text-left">
                <h1>Edit employee record</h1>
                <hr>
                <form action="edit.php" method="post" autocomplete="off">
                    <div class="form-group row">
                        <label for="empID" class="col-sm-2 col-form-label">Employee ID: </label>
                        <?php echo '<div class="col-sm-10"><input type="text" id="empID" name="empID" value="' . htmlspecialchars($id) . '" class="form-control" readOnly="readOnly" /></div>'; ?>
                    </div>
                    <div class="form-group row">
                        <label for="empName" class="col-sm-2 col-form-label">Employee Name: </label>
                        <?php echo '<div class="col-sm-10"><input type="text" id="empName" name="empName" placeholder="' . htmlspecialchars($name) . '" class="form-control" autofocus /></div>'; ?>
                    </div>
                    <div class="form-group row">
                        <label for="empPos" class="col-sm-2 col-form-label">Position: </label>
                        <?php echo '<div class="col-sm-10"><input type="text" id="empPos" name="empPos" placeholder="' . htmlspecialchars($pos) . '" class="form-control" /></div>'; ?>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-danger" id="cancel" name="cancel" value="Cancel">
                            <input type="submit" name="submit" id="submit" class="btn btn-dark">
                        </div>
                    </div>
                </form>
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