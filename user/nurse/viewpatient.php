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

    if (null !==(filter_input(INPUT_POST, 'edit'))){    
        $q = filter_input(INPUT_POST,'clinicno');
        $sql0 = "SELECT name,email,contactno,gender,dob,address,dc,mc FROM patient WHERE clinicno = '".$q."';";
        $result0 = mysqli_query($conn,$sql0);
        $queryResult0 = mysqli_num_rows($result0);
        if ($queryResult0 == 1){
            $row = mysqli_fetch_array($result0);
            $name =  $row['name'];
            $namesplit = preg_split('/\s+/', $name, -1, PREG_SPLIT_NO_EMPTY);
            $initials = $namesplit[0];
            $surname = $namesplit[1];
            $email =  $row['email'];
            $contactno =  $row['contactno'];
            $gender =  $row['gender'];
            $dob =  $row['dob'];
            $address =  $row['address'];
            $dc =  $row['dc'];
            $mc =  $row['mc'];
        }else{
            echo "<script>alert('Please check the Patient ID and try again!');window.location.href = './patientview.php';</script>";
        }
    }else{
        echo "<script>window.location.href = './patientview.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Edit Patient Details</title>
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
                <a class="dropdown-item" href="./register.php">Register Patient</a>
                <a class="dropdown-item" href="./furtherregister.php">Further Patient Registration</a>
                <a class="dropdown-item active" href="./patientview.php">View Patient Details</a>
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

    <form name="doclog" action="./pvfunction.php"  method="post">
        <div class="container">
            <center><h1 style="color:#242424;">View & Edit Patient Details</h1></center>
        </div>
        <br>
        <br>
        <div class="container border pt-4 bg-light rounded">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label"><h5>Name</h5></label>
                        <div class="col-lg-8">
                            <div class="input-group">
                            <input type="text" class="form-control form-control-sm col-sm-3" name="initials" id="initials" value="<?php echo $initials;?>" autocomplete="off" required autofocus>
                            <input type="text" class="form-control form-control-sm col-sm-9" name="surname" id="surname" value="<?php echo $surname;?>" autocomplete="off" required autofocus>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="gender" class="col-sm-4 col-form-label"><h5>Gender</h5></label>
                        <div class="col-lg-8">
                            <label class="radio-inline col-lg-3"><input type="radio" name="gender" value="1" <?php echo ($gender=='1')?'checked':'' ?>> Male</label>
                            <label class="radio-inline col-lg-3"><input type="radio" name="gender" value="0" <?php echo ($gender=='0')?'checked':'' ?>> Female</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-sm-4 col-form-label"><h5>Date of Birth</h5></label>
                        <div class="col-lg-8">
                            <input type="date" class="form-control form-control-sm" name="dob" id="dob" value="<?php echo $dob;?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label"><h5>Email</h5></label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control form-control-sm" name="email" id="email" value="<?php echo $email;?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="address" class="col-sm-4 col-form-label"><h5>Address</h5></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control form-control-sm" name="address" id="address" value="<?php echo $address;?>" autocomplete="off" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contactno" class="col-sm-4 col-form-label"><h5>Telephone Number</h5></label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" name="contactno" id="contactno" value="<?php echo $contactno;?>" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="clinic" class="col-sm-4 col-form-label"><h5>Clinic</h5></label>
                        <div class="col-lg-8">
                            <label class="checkbox-inline col-lg-3"><input type="checkbox" name="clinicd" value="1" <?php echo ($dc=='1')?'checked':'' ?>> Diabetes Clinic</label>
                            <label class="checkbox-inline col-lg-3"><input type="checkbox" name="clinicm" value="1" <?php echo ($mc=='1')?'checked':'' ?>> Medical Clinic</label>
                        </div>
                    </div>
                    <input type="hidden" name="clinicno" value="<?php echo $q;?>">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                </div>
                <div class="col-lg-2">
                    <input type="submit" value="Update Details" class="btn btn-primary btn-lg" name="submit">  
                </div>
                <div class="col-lg-2">
                    <input type="button" value="Go Back" class="btn btn-primary btn-lg" onclick="history.go(-1);"> 
                </div>
                <div class="col-lg-4">
                </div>  
            </div>
            <br>
        </div>
    </form>



    <br>
<?php
    include '../../footer.php';
?>
</body>

</html>


