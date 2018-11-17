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

    <title>Password Reset</title>

    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../styles.css"/>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/tooplate-style.css">
</head>

<body id="LoginForm" style="background-color: #E0E0E0;">

<!-- MENU -->
<section class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">

        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>

            <!-- lOGO TEXT HERE -->
            <a href="../" class="navbar-brand"><i class="fa fa-h-square"></i>&nbsp &nbsp Divisional Hospital, Bentota</a>
        </div><!--navbar-header-->

        <!-- MENU LINKS -->
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">

                <li class="nav-item">
                    <a class="nav-link" href="<?php if (isset($_SESSION['userid'])) {include '../homelink.php';}else{echo "../";}?>"><?php if (isset($_SESSION['userid'])) { include '../homename.php';}else{echo "";}?> Home<span class="sr-only">(current)</span></a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../about">Overview</a></li>
                        <li><a href="../about/vision.php">Vision & Mission</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="../services">Clinic Services</a></li>
                        <li><a href="../services/opd.php">OPD Services</a></li>
                    </ul>
                </li>

                <li><a href="../contact" class="smoothScroll">Contact Details</a></li>

                <li class="nav-item">
                    <?php
                    if(!isset($_SESSION['userid'])){
                        echo '<a class="nav-link" href="./">Log in</a>';
                    }else{
                        echo '<a class="nav-link" href="../logout">Log out</a>';
                    }
                    ?>
                </li>

            </ul>
        </div><!--collapse navbar-collapse-->

    </div><!--container-->
</section><!--navbar navbar-default navbar-static-top-->

<!--LOGIN MODAL CODES--><br><br>
<div class="container">
    <div class="login-form">
        <div class="main-div" style="box-shadow: 0px 0px 12px #828282;">
            <div class="panel">
                <h2>Password Reset</h2>
                <p>Please enter your Login ID to reset the Password</p>
            </div><!--panel-->

            <form id="Login" action="./reset.php" method="post">

                <div class="form-group">


                    <input type="text" class="form-control" id="inputEmail" placeholder="Login ID" name="email" autocomplete="off" required>
                    <br>

                </div>
                <button type="submit" class="btn btn-primary" name="reset">Reset Password</button>

            </form>

        </div><!--main-div-->
    </div><!--login-form-->
</div><!--container bg-danger-->
<br><br>
<!-- FOOTER -->
<footer data-stellar-background-ratio="5" style="background-color: white;">
    <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                    <p>Fusce at libero iaculis, venenatis augue quis, pharetra lorem. Curabitur ut dolor eu elit consequat ultricies.</p>

                    <div class="contact-info">
                        <p><i class="fa fa-phone"></i> 010-070-0170</p>
                        <p><i class="fa fa-envelope-o"></i> <a href="#">info@company.com</a></p>
                    </div><!--contact-info-->
                </div><!--footer-thumb-->
            </div><!--col-md-4 col-sm-4-->

            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <div class="follow-us">
                        <h4 class="wow fadeInUp" data-wow-delay="0.4s">Follow Us</h4>
                    </div><!--follow-us-->
                    <ul class="social-icon">
                        <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                        <li><a href="#" class="fa fa-twitter"></a></li>
                        <li><a href="#" class="fa fa-instagram"></a></li>
                        <li><a href="#" class="fa fa-google-plus"></a></li>
                    </ul>
                </div><!--footer-thumb-->
            </div><!--col-md-4 col-sm-4-->


            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb">
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Our Location</h4>
                    <div class="latest-stories">
                        <div class="stories-image">
                            <a href="#"><img src="../images/news-image.jpg" class="img-responsive" alt=""></a>
                        </div><!--stories-image-->
                        <div class="stories-info">
                            <h5>Address</h5></a>
                        </div><!--stories-info-->
                    </div><!--latest-stories-->
                </div><!--footer-thumb-->
            </div><!--col-md-4 col-sm-4-->

            <div class="col-md-12 col-sm-12 border-top">
                <div class="col-md-4 col-sm-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2018 Divisional Hospital of Bentota. | All right Reserved.</p>
                    </div><!--copyright-text-->
                </div><!--col-md-4 col-sm-6-->
                <div class="col-md-6 col-sm-6">
                    <div class="copyright-text">
                        <p>Developed by Group 16 of University of Colombo School of Computing</p>
                    </div><!--copyright-text-->
                </div><!--col-md-6 col-sm-6-->
                <div class="col-md-2 col-sm-2 text-align-center">
                    <div class="angle-up-btn">
                        <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                    </div><!--angle-up-btn-->
                </div><!--col-md-2 col-sm-2 text-align-center-->
            </div><!--col-md-12 col-sm-12 border-top-->

        </div><!--row-->
    </div><!--container-->
</footer>


<!-- SCRIPTS -->
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.sticky.js"></script>
<script src="../js/jquery.stellar.min.js"></script>
<script src="../js/wow.min.js"></script>
<script src="../js/smoothscroll.js"></script>
<script src="../js/owl.carousel.min.js"></script>
<script src="../js/custom.js"></script>

</body>
</html>

<?php
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

