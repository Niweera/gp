<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 5){
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
    <script src="../admin/script.js"></script>
</head>
<body onload="startTime()">
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0097a7;"><!--change-->
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
            Quick Access
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./viewrecords.php">View Medical Records</a>
                <a class="dropdown-item" href="./appointment.php">Make an Appointment</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./patientedit.php">Edit Profile</a>
            </div>
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
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="container">
                <img class="border" src=<?php echo returnImage(); ?> style="width:450px;height:450px" alt="Admin"/><!--change-->
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <div class="container border">
                    <p class="display-4">Welcome,<br> <?php echo $_SESSION['name']; ?>.</p>
                    <h1>What would you like to do today?</h1>
                    <h2>Today is:</h2>
                    <?php 
                        date_default_timezone_set("Asia/Colombo");
                        echo "<p style=\"font-size:38px;margin:0px\">" .date("l").","." ".date("d/m/Y")."</p>";
                    ?>
                    <p class="display-4" id="time"></p>
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
                <h3>Quick Access</h3>
                <hr>
                <div class="list-group">
                    <a href="./viewrecords.php" class="list-group-item list-group-item-action"><strong>View Medical Records</strong></a>
                    <a href="./appointment.php" class="list-group-item list-group-item-action"><strong>Make an Appointment</strong></a>
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
                                    <a href="./patientedit.php" class="btn btn-info btn-block">Go</a><!--change-->
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<?php
    include '../../real_footer.php';
    include '../../footer.php';
?>
<?php
    function returnImage() {
        include '../../dbconf/dbh.php';
        $clinicno = $_SESSION['userid'];
        $sql = "SELECT gender FROM patient WHERE clinicno = '$clinicno';";
        $query = mysqli_query($conn,$sql);
        $queryResult = mysqli_num_rows($query);
        if ($queryResult == 1){
            $row = mysqli_fetch_array($query);
            $gender =  $row['gender'];
            if ($gender == 0){
                return "../../sourcefiles/patientfemale.svg";
            }else{
                return "../../sourcefiles/patientmale.svg";
            }
        }else{
            return "../../sourcefiles/patientmale.svg";
        }
    }
    mysqli_close($conn);
?>
