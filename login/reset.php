<?php
	include '../dbconf/dbh.php';
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Home</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../styles.css"/>
	<link rel="stylesheet" href="./style.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body id="LoginForm">
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
    <a class="navbar-brand" href="../">Regional Hospital, Bentota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="../">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../about">Overview</a>
                <a class="dropdown-item" href="#">Vision & Mission</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Services
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Clinic Services</a>
                <a class="dropdown-item" href="#">OPD Services</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./#">Contact Details</a>
        </li>
        <li class="nav-item">
            
            <a class="nav-link active" href="./">Login</a>
        </li>
        </ul>
    </div>
</nav>
<!--End of the Header navigation bar for the website-->
<!-- login modal codes-->
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Password Reset</h2>
   <p>Please enter your Login ID to reset the Password</p>
   </div>
    <form id="Login" action="./reset.php" method="post">

        <div class="form-group">


            <input type="text" class="form-control" id="inputEmail" placeholder="Login ID" name="email" required>
            <br>

        </div>
        <button type="submit" class="btn btn-primary" name="reset">Reset Password</button>

    </form>
    </div>
</div>
</div>
</div>

<?php
    include '../footer.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'C:/xampp/php/pear/PHPMailer/src/Exception.php';
    require 'C:/xampp/php/pear/PHPMailer/src/PHPMailer.php';
    require 'C:/xampp/php/pear/PHPMailer/src/SMTP.php';
?>

<?php

if (null !==(filter_input(INPUT_POST, 'reset'))){
    $username = mysqli_real_escape_string($conn, $_POST['email']);

    include './function.php';
    $list = returnFlag($username);
    $sql1 = "SELECT email FROM `$list[0]` WHERE `$list[1]`='$username';";
    $result2 = mysqli_query($conn,$sql1);
    $row1 = mysqli_fetch_assoc($result2);
    $email = $row1['email'];
	if($email != ""){
        $password = rand(999, 99999);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $usql = "UPDATE `user` SET password='$hashed_password' WHERE userid='$username'";
        $result = mysqli_query($conn, $usql);
        if($result){
            $to = $email;
            $subject = "Your Recovered Password";
            $message = "Please use this username and password to login: \nUsername: " . $username . "\nPassword: ". $password ."\nGo to this link to login: http://localhost/gp/login/ \nPlease change the password after the login.";
            $headers = "From: hmsystem.noreply@gmail.me";
            if(mail($to, $subject, $message, $headers)){
                echo '<script>alert("Your Password has been sent to your email id");</script>';
            }
            else{
                echo '<script>alert("Failed to Recover your password, try again");</script>';
            }
        }
    }else{
		echo '<script>alert("User name does not exist in database");</script>'; 
	}
}

?>