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

    $sqlc = "SELECT COUNT(clinicno) AS count FROM patient;";
    $mysqli_query = mysqli_query($conn, $sqlc);
    $row = mysqli_fetch_array($mysqli_query);
    $patientCount =  $row['count'];
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
    <script src="script.js"></script>
</head>
<body>
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
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
                <a class="dropdown-item active" href="./register.php">Register Patient</a>
                <a class="dropdown-item" href="./register2.php">Further Patient Registration</a>
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

    <form name="doclog" action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
        <div class="container">
            <center><h1 style="color:#242424;">Patient Registration</h1></center>
        </div>
        <br>
        <br>
        <div class="container border pt-4 bg-light rounded">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="reg" class="col-sm-4 col-form-label"><h5>Already registered in another clinic?</h5></label>
                        <div class="col-lg-8">
                            <button  class="text-center btn btn-primary btn mb-2" onclick="window.location.href='./register2.php'">Register for another clinic</button>
                        </div>
                    </div>
                    <hr>
                    <br>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label"><h5>Name</h5></label>
                        <div class="col-lg-8">
                            <div class="input-group">
                            <input type="text" class="form-control form-control-sm col-sm-3" name="initials" id="initials" placeholder="Enter Initials" autocomplete="off" required autofocus>
                            <input type="text" class="form-control form-control-sm col-sm-9" name="surname" id="surname" placeholder="Enter Surname" autocomplete="off" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-4 col-form-label"><h5>Gender</h5></label>
                        <div class="col-lg-8">
                            <label class="radio-inline col-lg-3"><input type="radio" name="gender" value="1"> Male</label>
                            <label class="radio-inline col-lg-3"><input type="radio" name="gender" value="0"> Female</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-sm-4 col-form-label"><h5>Date of Birth</h5></label>
                        <div class="col-lg-8">
                            <input type="date" class="form-control form-control-sm" name="dob" id="dob" placeholder="Enter Date of Birth YYYY-MM-DD" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label"><h5>Email</h5></label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Enter Email" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label"><h5>Address</h5></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control form-control-sm" name="address" id="address" placeholder="Enter Address" autocomplete="off" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contactno" class="col-sm-4 col-form-label"><h5>Telephone Number</h5></label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" name="contactno" id="contactno" placeholder="Enter Telephone Number" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="clinic" class="col-sm-4 col-form-label"><h5>Clinic</h5></label>
                        <div class="col-lg-8">
                            <label class="checkbox-inline col-lg-3"><input type="checkbox" name="clinicd" value="1"> Diabetes Clinic</label>
                            <label class="checkbox-inline col-lg-3"><input type="checkbox" name="clinicm" value="1"> Medical Clinic</label>
                        </div>
                    </div>
                     
                </div>
            </div>
            <center> <input type="submit" value="Register" class="btn btn-primary btn-lg" name="submit"> </center>   
            <br>
        </div>
        <br>
        <br>
          
        <br>
        <br>
    </form>



    <br>
<?php
    include '../../footer.php';
?>
</body>

</html>


<?php
    if (null !==(filter_input(INPUT_POST, 'submit'))){
        $initials = filter_input(INPUT_POST,'initials');
        $surname = filter_input(INPUT_POST,'surname');
        $name = $initials." ".$surname;
        $contactno = filter_input(INPUT_POST,'contactno');
        $gender = filter_input(INPUT_POST,'gender');
        $email = filter_input(INPUT_POST,'email');
        $dob = filter_input(INPUT_POST,'dob');
        $address = filter_input(INPUT_POST,'address');
        $dc = filter_input(INPUT_POST,'clinicd');
        $mc = filter_input(INPUT_POST,'clinicm');
        
        $firstSurname = strtolower($surname[0]);
        $dobDigits =  date('Y', strtotime($dob));
        $dob2Digits = substr($dobDigits, 2, 2);
        $str_length = 4;
        $patientCount = $patientCount + 1;
        $no = substr("0000{$patientCount}", -$str_length);
        $clinicno = $firstSurname.$dob2Digits.$no;
        $password = rand(999, 99999);
        $nurseid = $_SESSION['userid'];
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $flag = "5";
        
        $sql = "INSERT INTO user (userid,password,flag) VALUES ('$clinicno','$hashed_password','$flag');";
        $sql .= "INSERT INTO patient (name,gender,dob,contactno,clinicno,email,address,nurseid,dc,mc) VALUES ('$name','$gender','$dob','$contactno','$clinicno','$email','$address','$nurseid','$dc','$mc');";
        
        $mysqli_query = mysqli_multi_query($conn, $sql);
       
        if (!$mysqli_query){
                    echo "<script>alert(\"Error Occured!\");</script>";
                }else {
                    $to = $email;
                    $subject = "Activate your account";
                    $message = "Please use this username and password to login: \nUsername: " . $clinicno . "\nPassword: ". $password ."\nGo to this link to login: http://localhost/gp/login/ \nPlease change the password after the first login.";
                    $headers = "From: hmsystem.noreply@gmail.me";
                    if(mail($to, $subject, $message, $headers)){
                        echo "<script>alert(\"Successfully registered!\");</script>";
                    }
                    else{
                        echo '<script>alert("Error occured in sending the password, try again!");</script>';
                    }
                    
                }
    }
    





?>