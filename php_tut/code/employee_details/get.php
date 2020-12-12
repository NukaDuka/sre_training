<?php
$query = null;
$success = true;
$start_time =  microtime(true);
$blank = false;
$id = [];
$name = [];
$pos = [];
if ($_POST['empID'] == "") $blank = true;
if (!$blank && (isset($_POST['submit']) || isset($_POST['reset']) || isset($_POST['all']))) {
    $_id = trim($_POST['empID']);
    $con = mysqli_connect("mariadb", "employee_php", "ZW1wbG95ZWVfdGFibGUK", "employee");
    if ($con) {
        if (isset($_POST['submit'])) {
            
            $query = mysqli_prepare($con, "select * from employees where id = ?");
            mysqli_stmt_bind_param($query, 's', $_id);
            if (!mysqli_stmt_execute($query)) {
                $success = false;  
            }
            mysqli_stmt_bind_result($query, $_id, $_name, $_pos);
            while (mysqli_stmt_fetch($query)) {
                array_push($id, $_id);
                array_push($name, $_name);
                array_push($pos, $_pos);
            }
            mysqli_stmt_close($query);
        }   
    }
    else {
        echo "Error: " . mysqli_connect_error();
    }
    mysqli_close($con);
}
$elapsed_time = microtime(true) - $start_time;
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
    <title>Fetch employee details</title>
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
                <?php 
                if (!$blank && $success && (isset($_POST['submit']) || isset($_POST['all']))) {
                    echo '<div class="alert alert-success alert-dismissible" role="alert" align="center"><button type="button" class="close" data-dismiss="alert">&times;</button><strong>Success!</strong> Query executed (' . number_format($elapsed_time, 5). 's)</div>';
                }
                ?>
                <h1>Retrieve employee details</h1>
                <hr>
                <form action="get.php" method="post" autocomplete="off">
                    <div class="form-group row">
                        <label for="empID" class="col-sm-2 col-form-label">Employee ID: </label>
                        <div class="col-sm-10"><input type="text" id="empID" name="empID" placeholder="1234" class="form-control" autofocus></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-dark" id="submit" name="submit" value="Submit">
                            <input type="submit" class="btn btn-dark" id="reset" name="reset" value="Reset">
                            <input type="submit" class="btn btn-dark" id="all" name="all" value="Show all employees">
                        </div>
                    </div>
                </form>
                <br>
                <hr>
                <?php 
                if (!$blank && (isset($_POST['submit']) || isset($_POST['all']))) {
                    echo "<h4>Result:</h4><br>";
                    if (count($id) == 0)
                    {
                        echo "Empty set<br>";
                    }
                    else {
                        echo '<table class="table table-bordered table-striped table-hover">';
                        echo '<thead class="thead-light>';
                        echo '<tr>';
                        echo '<th scope="col">No.</th>';
                        echo '<th scope="col">Employee ID</th>';
                        echo '<th scope="col">Name</th>';
                        echo '<th scope="col">Position</th>';
                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';
                        $count = 1;
                        for (; $count <= count($id); $count++) {
                            echo "<tr>";
                            echo '<td>' . $count . '</td>';
                            echo '<td>' . $id[$count-1] . '</td>';
                            echo '<td>' . $name[$count-1] . '</td>';
                            echo '<td>' . $pos[$count-1] . '</td>';
                            echo '</tr>';
                        }
                        echo '</tbody>';
                        echo '</table>';
                    }
                }
                ?>
                <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
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