<?php
  include '../dbconf/dbh.php';
  session_start();
  
  
  if(isset($_POST['submit']))
  {
    if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !=''))
    {
      $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
      $password = trim(mysqli_real_escape_string($conn, $_POST['password']));
      
      $sqlEmail = "select * from user where userid = '".$email."'";
      $rs = mysqli_query($conn,$sqlEmail);
      $numRows = mysqli_num_rows($rs);
      
      if($numRows  == 1)
      {
        $row = mysqli_fetch_assoc($rs);
        
        if(password_verify($password,$row['password']))
        {
                    session_start();
                    include './function.php';
                    $list = returnFlag($email);
                    $sql1 = "SELECT * FROM `$list[0]` WHERE `$list[1]`='$email';";
                    $result2 = mysqli_query($conn,$sql1);
                    $row1 = mysqli_fetch_assoc($result2);
                    $_SESSION['name'] = $row1['name'];
                    $_SESSION['email'] = $row1['email'];
                    $_SESSION['contactno'] = $row1['contactno'];
          $_SESSION['userid'] = $row['userid'];
                    $_SESSION['flag'] = $row['flag'];
                    if ($_SESSION['flag'] == 0){
                        header('location: ../user/admin');
              exit;
                    }
                    elseif ($_SESSION['flag'] == 1){
                        header('location: ../user/doctor');
              exit;
                    }
          elseif ($_SESSION['flag'] == 2){
                        header('location: ../user/dispenser');
              exit;
                    }
                    elseif ($_SESSION['flag'] == 3){
                        header('location: ../user/pharmacist');
              exit;
                    }
                    elseif ($_SESSION['flag'] == 4){
                        header('location: ../user/nurse');
              exit;
                    }
                    elseif ($_SESSION['flag'] == 5){
                        header('location: ../user/patient');
              exit;
                    }
          
        }
        else
        {
          echo "<script>alert(\"Wrong User ID Or Password!\");</script>";
        }
      }
      else
      {
        echo "<script>alert(\"No User Found!\");</script>"; 
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <title>Login</title>
    
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

<body id="LoginForm">

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
                                    <li><a href="../about/vission.php">Vission & Mission</a></li>
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
                                    echo '<a class="nav-link" href="./login">Log in</a>';
                                }else{
                                    echo '<a class="nav-link" href="./logout">Log out</a>';
                                        }
                            ?>
                        </li>

                    </ul>
               </div><!--collapse navbar-collapse-->

          </div><!--container-->
     </section><!--navbar navbar-default navbar-static-top-->

    <!--LOGIN MODAL CODES--><br><br>
    <div class="container bg-danger">
      <div class="login-form">
        <div class="main-div">
            <div class="panel">
                <h2>User Login</h2>
                <p>Please enter your Login ID and Password</p>
            </div><!--panel-->

            <form id="Login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" id="inputEmail" placeholder="Login ID" name="email" autocomplete="off" required autofocus>
                </div><!--form-group-->

                <div class="form-group">
                    <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required autofocus>
                </div><!--form-group-->

                <div class="forgot">
                    <a href="reset.php">Forgot password?</a>
                </div><!--forgot-->

                <button type="submit" class="btn btn-primary" name="submit">Login</button>

            </form>

        </div><!--main-div-->
      </div><!--login-form-->
  </div><!--container bg-danger-->
<br><br>
      <!-- FOOTER -->
      <footer data-stellar-background-ratio="5">
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

