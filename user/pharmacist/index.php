<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 3){
                header('location: ../../login');        
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Welcome <?php echo $_SESSION['userid'];?></title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="../admin/script.js"></script>
    <script src="./msgcountscript.js"></script>
</head>
<body onload="startTime()">
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0097a7;box-shadow: 0px 0px 12px #828282;"><!--change-->
    <a class="navbar-brand" href="../../">Divisional Hospital, Bentota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link active" href="./">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Inventory Management
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./viewinventory.php">View Inventory</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./pharmaedit.php">Edit Profile</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./view_reports.php">Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../logout">Logout</a>
        </li>
        </ul>
    </div>
</nav>
<!--End of the Header navigation bar for the website-->
<br>


<!-- Start of the body content -->
<div class="container">
    <div class="row">
        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="container">
                <img class="border" src="../../sourcefiles/pharmacist (1).svg" style="width:266px;height:266px" alt="Pharmacist"/>
            </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 col-xs-12">
            <div class="container border pb-3">
                    <p class="display-4"><strong>Welcome, <?php echo $_SESSION['name']; ?>.</strong></p>
                    <h1>What would you like to do today?</h1><br>
                    <h2>Today is:<br><span class="h3">
                    <?php 
                        date_default_timezone_set("Asia/Colombo");
                        echo date("l").","." ".date("d/m/Y");
                    ?></span>
                    <span class="h3" id="time"></span></h2>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="container">
                <h3>Inventory Management</h3>
                <hr>
                <div class="list-group">
                    <a href="./viewinventory.php" class="list-group-item list-group-item-action"><strong>View Inventory</strong></a>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="container">
                <h3>Quick Links</h3>
                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Edit Profile</h5><hr>
                                    <a href="./pharmaedit.php" class="btn btn-info btn-block">Go</a><!--change-->
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">View Reports &nbsp<span class="badge badge-danger" id="msgCount"></span></h5><hr>
                                    <a href="./view_reports.php" class="btn btn-info btn-block">View</a><!--change-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<?php
    include '../../real_footer.php';
?>
    
    <!--JS files needed for bootstrap to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
<?php
    mysqli_close($conn);  
?>
