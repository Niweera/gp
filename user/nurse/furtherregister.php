<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 4){
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
    <title>Patient Registration</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="script.js"></script><!--script for ajax patient id retrieve-->
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Patient Management
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./register.php">Register Patient</a>
                <a class="dropdown-item active" href="./register2.php">Further Patient Registration</a>
                <a class="dropdown-item" href="./patientview.php">View Patient Details</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./nursedit.php">Edit Profile</a>
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
        <center><h1 style="color:#242424;">Further Patient Registration</h1></center>
    </div>
    <br>
    <br>
    <form name="doclog" action="./furtherregister.php"  method="post">
        <div class="container border pt-4 bg-light rounded mt-3 mb-5">
            <div class="form-group row mt-3">
                <div class="col-sm-3"></div>
                <label for="clinicno" class="col-sm-2 col-form-label"><h5>Patient ID:</h5></label>
                <div class="col-lg-4 mb-1 search-box">
                    <input type="text" class="form-control form-control-sm" name="clinicno" id="clinicno" placeholder="Enter Patient ID" autocomplete="off" required autofocus>
                    <div id='resultbox' class="result"></div>
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div id="txtHint"></div>
            <br>
            <hr>
            <div class="form-group row">
                <label for="clinic" class="col-sm-12 col-form-label"><h5>* Click Submit to register in both Diabetes and Medical clinics</h5></label>
            </div>
            <hr>
            <div class="form-group row mb-5">
                <div class="col-sm-5"></div>
                <input type="submit" value="Submit" class="col-md-2 text-center btn btn-info btn" name="submit" onclick="myFunction()"><!--change-->
                <div class="col-sm-5"></div>
            </div>
        </div>    
    </form>
    

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
if (null !==(filter_input(INPUT_POST, 'submit'))){
    $q = filter_input(INPUT_POST,'clinicno');
    $sql0 = "SELECT clinicno FROM patient WHERE clinicno = '".$q."';";
    $result0 = mysqli_query($conn,$sql0);
    $queryResult0 = mysqli_num_rows($result0);
    if ($queryResult0 > 0){
        $sqlupdate = "UPDATE `patient` SET `mc` = '1', `dc` = '1' WHERE `patient`.`clinicno` = '".$q."';";
        $result = mysqli_query($conn,$sqlupdate);
        if (!$result){
            echo "<script>alert('Error occured!');window.location.href = './furtherregister.php';</script>";
        }else{
            echo "<script>alert('Successfully clinic detials updated!');window.location.href = './furtherregister.php';</script>";
        }
    }else{
        echo "<script>alert('Please check the Patient ID and try again!');window.location.href = './furtherregister.php';</script>";
    }
}
mysqli_close($conn);
?>



