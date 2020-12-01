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
    <link href="../bootstrap/css/bootstrap.css" rel="stylesheet" />
    <link href="../bootstrap/css/bootstrap-theme.css" rel="stylesheet" />
    <script href="../bootstrap/js/bootstrap.js" rel="stylesheet"></script>
    <script href="../bootstrap/js/jquery.js" rel="stylesheet"></script>
    <title>Enter employee details</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: #e3f2fd;">
        <a class="nav-item navbar-brand" href="index.html">Employee details page</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-item nav-link" href="index.html">Home</a></li>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link active" href="enter.php">Enter details</a></li>
                </li>
                <li class="nav-item">
                    <a class="nav-item nav-link" href="get.php">Get details</a></li>
                </li>
            </ul>
        </div>
    </nav>
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
                <h1>Retrieve existing employee details</h1>
                <hr>
                <form action="#" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="empID">Employee ID</label>
                        <input type="text" id="empID" placeholder="1234" class="form-control" autofocus>
                    </div>
                    <div class="form-group">
                        <label for="empName">Employee Name</label>
                        <input type="text" id="empName" placeholder="John Smith" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="empPos">Position</label>
                        <input type="text" id="empPos" placeholder="Marketing" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-light">Submit</button>
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