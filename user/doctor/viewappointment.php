<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 1){
                header('location: ../../login');	 	
            }
        }

    if (isset($_POST['dcsubmit']) || isset($_POST['mcsubmit'])){
    $date = filter_input(INPUT_POST,'date');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Appointments</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <style>
    input[type='number'] {
    -moz-appearance:textfield;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    </style>
</head>
<body>
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0097a7;box-shadow: 0px 0px 12px #828282;">
    <a class="navbar-brand" href="../../">Divisional Hospital, Bentota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="./">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Access
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="./appointments.php">Appointments</a>
                <a class="dropdown-item" href="./viewinventory.php">Inventory</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./docedit.php">Edit Profile</a>
                <a class="dropdown-item" href="./dcprescription.php">Diabetes Clinic Prescription</a>
                <a class="dropdown-item" href="./mcprescription.php">Medical Clinic Prescription</a>
                <a class="dropdown-item" href="./viewrecords.php">Medical Records</a>
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
    <?php if (null !==(filter_input(INPUT_POST, 'dcsubmit'))) {?>
    <?php
        $sql0 = "SELECT count(appointmentno) as count FROM appointment WHERE clinic = '0' AND date ='$date';";
        $result0 = mysqli_query($conn,$sql0);
        $queryResult0 = mysqli_num_rows($result0);
        if ($queryResult0 > 0){
            $row=mysqli_fetch_assoc($result0);
            $count = $row['count'];
        }else{
            $count = 0;
        }
    ?>
    <div class="container">
        <center><h1 style="color:#242424;">Diabetes Clinic Appointments</h1></center>
    </div>
    <br>
    <br>
    <div class="container border pt-4 bg-light rounded mt-3 mb-5">
        <div class="form-group row mt-4">
            <div class="col-sm-3"></div>
            <label class="col-sm-3 col-form-label"><h5>Appointment Count:</h5></label>
            <label class="col-sm-3 col-form-label"><h5><b><?php echo $count; ?></b></h5></label>
            <div class="col-sm-3"></div>
        </div>
        <div class="form-group row mb-5">
            <div class="col-sm-5"></div>
            <input type="button" value="Go Back" class="col-md-2 text-center btn btn-info btn" onclick="history.go(-1);">
            <div class="col-sm-5"></div>
        </div>
    </div>    
    <?php }else if (null !==(filter_input(INPUT_POST, 'mcsubmit'))) {?>
    <?php
        $sql0 = "SELECT count(appointmentno) as count FROM appointment WHERE clinic = '1'AND date ='$date';";
        $result0 = mysqli_query($conn,$sql0);
        $queryResult0 = mysqli_num_rows($result0);
        if ($queryResult0 > 0){
            $row=mysqli_fetch_assoc($result0);
            $count = $row['count'];
        }else{
            $count = 0;
        }
    ?>
    <div class="container">
        <center><h1 style="color:#242424;">Medical Clinic Appointments</h1></center>
    </div>
    <br>
    <br>
    <div class="container border pt-4 bg-light rounded mt-3 mb-5">
        <div class="form-group row mt-4">
            <div class="col-sm-3"></div>
            <label class="col-sm-3 col-form-label"><h5>Appointment Count:</h5></label>
            <label class="col-sm-3 col-form-label"><h5><b><?php echo $count; ?></b></h5></label>
            <div class="col-sm-3"></div>
        </div>
        <div class="form-group row mb-5">
            <div class="col-sm-5"></div>
            <input type="button" value="Go Back" class="col-md-2 text-center btn btn-primary btn" onclick="history.go(-1);">
            <div class="col-sm-5"></div>
        </div>
    </div>    
    <?php }?>
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
    }else{
        echo "<script>alert(\"Go To View Appointments Page to continue!\");history.go(-1);</script>";
    }
mysqli_close($conn);
?>



