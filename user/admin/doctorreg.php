<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 0){
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
    <title>Doctor Registration</title>
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
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0097a7;"><!--change-->
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
            User Administration
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="./create.php">Create Profile</a>
                <a class="dropdown-item" href="./adminview.php">View Profile</a>
                <a class="dropdown-item" href="./adminedit.php">Edit Profile</a>
                <a class="dropdown-item" href="./delete.php">Delete Profile</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./viewinventory.php">View Inventory</a>
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
            <center><h1 style="color:#242424;">Doctor Registration</h1></center>
        </div>
        <br>
        <br>
        <div class="container border pt-4 bg-light rounded">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label"><h5>Name</h5></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Enter Name" autocomplete="off" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label"><h5>Email</h5></label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Enter Email" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contactno" class="col-sm-4 col-form-label"><h5>Telephone Number</h5></label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" name="contactno" id="contactno" placeholder="Enter Telephone Number" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="slmcid" class="col-sm-4 col-form-label"><h5>SLMC ID</h5></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control form-control-sm" name="slmcid" id="slmcid" placeholder="Enter SLMC ID" autocomplete="off" required autofocus>
                        </div>
                    </div> 
                </div>
            </div>
            <center> <input type="submit" value="Register" class="btn btn-info btn-lg" name="submit"> </center><!--change-->   
            <br>
        </div>
        <br>
        <br>
          
        <br>
        <br>
    </form>



    <br>
    <?php
    include '../../real_footer.php';
    include '../../footer.php';
?>


<?php
    if (null !==(filter_input(INPUT_POST, 'submit'))){
        $name = filter_input(INPUT_POST,'name');
        $contactno = filter_input(INPUT_POST,'contactno');
        $slmcid = filter_input(INPUT_POST,'slmcid');
        $email = filter_input(INPUT_POST,'email');
        $password = rand(999, 99999);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $flag = "1";
        
        $sql .= "INSERT INTO user (userid,password,flag) VALUES ('$slmcid','$hashed_password','$flag');";
        $sql .= "INSERT INTO doctor (name,contactno,slmcid,email) VALUES ('$name','$contactno','$slmcid','$email');";
        
        $mysqli_query = mysqli_multi_query($conn, $sql);
       
        if (!$mysqli_query){
                    echo "<script>alert(\"Error Occured!\");</script>";
                }else {
                    $to = $email;
                    $subject = "Activate your account";
                    $message = "Please use this username and password to login: \nUsername: " . $slmcid . "\nPassword: ". $password ."\nGo to this link to login: http://localhost/gp/login/ \nPlease change the password after the first login.";
                    $headers = "From: hmsystem.noreply@gmail.me";
                    if(mail($to, $subject, $message, $headers)){
                        echo "<script>alert(\"Successfully registered!\");</script>";
                    }
                    else{
                        echo '<script>alert("Error occured in sending the password, try again");</script>';
                    }
                    
                }
    }






?>