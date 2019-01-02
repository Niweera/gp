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


    $sql0 = "SELECT clinic,appointmentno FROM appointment WHERE clinicno = '".$_SESSION['userid']."';";
    $result0 = mysqli_query($conn,$sql0);
    $queryResult0 = mysqli_num_rows($result0);
    if ($queryResult0 > 0){
        while ($row=mysqli_fetch_assoc($result0)){
            $clinic0 = $row['clinic'];
            $appointmentno = $row['appointmentno'];
            $appointmentArray[$clinic0]=$appointmentno;
            $_SESSION['appointmentarray']=$appointmentArray;
        }
    }else{
        $appointmentArray['0']="";
        $appointmentArray['1']="";
        $_SESSION['appointmentarray']=$appointmentArray;
    }
    if (!isset($appointmentArray['0'])){
        $appointmentArray['0']="";
    }
    if (!isset($appointmentArray['1'])){
        $appointmentArray['1']="";
    }

    $sqlcheck = "SELECT clinic,nextdate FROM patientrecord WHERE clinicno = '".$_SESSION['userid']."';";
    $resultcheck = mysqli_query($conn,$sqlcheck);
    $queryResult1 = mysqli_num_rows($resultcheck);
    if ($queryResult1 > 0){
        while ($row=mysqli_fetch_assoc($resultcheck)){
            $clinic = $row['clinic'];
            $nextdate = $row['nextdate'];
            $clinicArray[$clinic]=$nextdate;
            $_SESSION['clinicarray']=$clinicArray;
        }
    }else{
        $clinicArray['0']="";
        $clinicArray['1']="";
        $_SESSION['clinicarray']=$clinicArray;
    }
    if (!isset($clinicArray['0'])){
        $clinicArray['0']="";
    }
    if (!isset($clinicArray['1'])){
        $clinicArray['1']="";
    }
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
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0097a7;box-shadow: 0px 0px 12px #828282;"><!--change-->
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
                <a class="dropdown-item" href="./viewrecords.php">View Medical Records</a>
                <a class="dropdown-item active" href="./appointment.php">Make an Appointment</a>
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

    <div class="container">
        <center><h1 style="color:#242424;">Make an Appointment</h1></center>
    </div>
    <br>
    <br>
    <form name="doclog" action="./setappointment.php"  method="post">
        <div class="container border pt-4 bg-light rounded mt-5 mb-5">

            <?php if ($clinicArray['0'] != "" && $clinicArray['1'] == ""){?>
            <div class="form-group row mt-4">
                <label class="col-sm-4 col-form-label"><h5>Next Diabetes Clinic Date:</h5></label>
                <label class="col-sm-2 col-form-label"><h5><b><?php echo $clinicArray['0'];?></b></h5></label>
                <label class="col-sm-3 col-form-label"><h5>Appointment No:</h5></label>
                <?php if ($appointmentArray['0'] == ""){?>
                <input type="submit" value="Get an Appointment No." class="col-md-2 text-center btn-sm btn-primary btn" name="dcappoint" 
                <?php 
                    date_default_timezone_set('Asia/Colombo');
                    $today = date("Y-m-d");
                    $clinicDate = $clinicArray['0'];
                    $releaseDate = date('Y-m-d', strtotime($clinicDate. ' - 1 days'));
                    if($today != $releaseDate){
                        echo "disabled";
                        $message = "<div><p class='text-danger'>*Appointment numbers will be available only from one day before the clinic date.</p></div>"; 
                    }//here if today is not equal to the day before the clinic, the submit button will be disabled
                ?>>
                <?php }else{?>
                <label class="col-sm-3 col-form-label"><h5><b><?php echo $appointmentArray['0'];?></h5></b></label>
                <?php }?>
            </div>
            <?php if(isset($message)){echo $message;} ?> <!--here if today is not the day before the clinic, a message will display-->

            <?php }else if ($clinicArray['1'] != "" && $clinicArray['0'] == "") {?>
            <div class="form-group row mt-4">
                <label class="col-sm-4 col-form-label"><h5>Next Medical Clinic Date:</h5></label>
                <label class="col-sm-2 col-form-label"><h5><b><?php echo $clinicArray['1'];?></b></h5></label>
                <label class="col-sm-3 col-form-label"><h5>Appointment No:</h5></label>
                <?php if ($appointmentArray['1'] == ""){?>
                <input type="submit" value="Get an Appointment No." class="col-md-2 text-center btn-sm btn-info btn" name="mcappoint"
                <?php 
                    date_default_timezone_set('Asia/Colombo');
                    $today = date("Y-m-d");
                    $clinicDate = $clinicArray['1'];
                    $releaseDate = date('Y-m-d', strtotime($clinicDate. ' - 1 days'));
                    if($today != $releaseDate){
                        echo "disabled";
                        $message = "<div><p class='text-danger'>*Appointment numbers will be available only from one day before the clinic date.</p></div>"; 
                    }//here if today is not equal to the day before the clinic, the submit button will be disabled
                ?>>
                <?php }else{?>
                <label class="col-sm-3 col-form-label"><h5><b><?php echo $appointmentArray['1'];?></h5></b></label>
                <?php }?>
            </div>
            <?php if(isset($message)){echo $message;} ?> <!--here if today is not the day before the clinic, a message will display-->

            <?php }else if ($clinicArray['1'] == "" && $clinicArray['0'] == "") {?>    
            <div class="form-group row mt-4">
                <label class="col-sm-12 col-form-label"><h3><b><center>Please register in a clinic first!</center></b></h3></label>
            </div>       
            <?php }else{?>  
            <div class="form-group row mt-4">
                <label class="col-sm-4 col-form-label"><h5>Next Diabetes Clinic Date:</h5></label>
                <label class="col-sm-2 col-form-label"><h5><b><?php echo $clinicArray['0'];?></b></h5></label>
                <label class="col-sm-3 col-form-label"><h5>Appointment No:</h5></label>
                <?php if ($appointmentArray['0'] == ""){?>
                <input type="submit" value="Get an Appointment No." class="col-md-2 text-center btn-sm btn-info btn" name="dcappoint"
                <?php 
                    date_default_timezone_set('Asia/Colombo');
                    $today = date("Y-m-d");
                    $clinicDate = $clinicArray['0'];
                    $releaseDate = date('Y-m-d', strtotime($clinicDate. ' - 1 days'));
                    if($today != $releaseDate){
                        echo "disabled";
                        $message = "<div><p class='text-danger'>*Appointment numbers will be available only from one day before the clinic date.</p></div>"; 
                    }//here if today is not equal to the day before the clinic, the submit button will be disabled
                ?>>
                <?php }else{?>
                <label class="col-sm-3 col-form-label"><h5><b><?php echo $appointmentArray['0'];?></h5></b></label>
                <?php }?>
            </div>
            <div class="form-group row mt-4">
                <label class="col-sm-4 col-form-label"><h5>Next Medical Clinic Date:</h5></label>
                <label class="col-sm-2 col-form-label"><h5><b><?php echo $clinicArray['1'];?></b></h5></label>
                <label class="col-sm-3 col-form-label"><h5>Appointment No:</h5></label>
                <?php if ($appointmentArray['1'] == ""){?>
                <input type="submit" value="Get an Appointment No." class="col-md-2 text-center btn-sm btn-info btn" name="mcappoint"
                <?php 
                    date_default_timezone_set('Asia/Colombo');
                    $today = date("Y-m-d");
                    $clinicDate = $clinicArray['1'];
                    $releaseDate = date('Y-m-d', strtotime($clinicDate. ' - 1 days'));
                    if($today != $releaseDate){
                        echo "disabled";
                        $message = "<div><p class='text-danger'>*Appointment numbers will be available only from one day before the clinic date.</p></div>"; 
                    }//here if today is not equal to the day before the clinic, the submit button will be disabled
                ?>>
                <?php }else{?>
                <label class="col-sm-3 col-form-label"><h5><b><?php echo $appointmentArray['1'];?></h5></b></label>
                <?php }?>
            </div>
            <?php if(isset($message)){echo $message;} ?> <!--here if today is not the day before the clinic, a message will display-->
            <?php }?>
            <br>
        </div>    
    </form>
    
<br>
<br>
<?php
    include '../../real_footer.php';
?>
    
    <!--JS files needed for bootstrap to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>




