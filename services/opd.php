<?php
  session_start();
    include '../dbconf/dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <title>Opd</title>

    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!--MAIN-->
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <link rel="stylesheet" href="../about/style.css">
</head>

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
                              <li><a href="./">Clinic Services</a></li>
                              <li><a href="./opd.php">OPD Services</a></li>
                          </ul>
                    </li>
                         
                    <li class="nav-item">
                        <?php
                            if(!isset($_SESSION['userid'])){
                                echo '<a class="nav-link" href="../login">Log in</a>';
                            }else{
                                echo '<a class="nav-link" href="../logout">Log out</a>';
                            }
                        ?>
                    </li>

                  </ul>
              </div><!--collapse navbar-collapse-->

          </div><!--container-->
     </section><!--navbar navbar-default navbar-static-top-->

    <!--HEADER IMAGE--> 
      <img src="../images/bbb.jpg" alt="we" width="100%" height="320">
    
    
    <!--CONTENT-->
    <div class="container contain-area" id="es-content">    
        <h1 class="inner-page-title"> OPD Services</h1>
    </div><!--container contain-area-->
    

    <div class="col-md-6">
        <img src="../images/opd1.jpg" alt="" width="70%" class="img-rounded">
      </div><!--col-md-6-->
		
    <div align="center" itemprop="articleBody">
		<div  class="row">
<div  class="col-md-6">
<h3><span style="color: #135cae;"><strong>Medical Clinic</strong></span></h3>
<p>On Every Thursdays from 8.0am to 12.00noon  &nbsp; this medical service is provided to the patients. &nbsp;</p>
<hr id="mce-hr-marker" />
<h3><span style="color: #135cae;"><strong>&nbsp;Diabetes Clinic</strong></span></h3>
<p>Except on 4th week monday, every mondays from 8.00 am to 12.00 noon this clinic will be in operation.</p>
<hr id="mce-hr-marker" />

    
            </div>
                                    </div>
                        </div>
                                </div>
        </div>
        
 

  

    <!-- FOOTER -->
     <footer data-stellar-background-ratio="5">
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-4">
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                              <div class="contact-info">
                                   <p><i class="fa fa-phone"></i>034-2275260</p>
                                   <p><i class="fa fa-envelope-o"></i> <a href="#">info@divisionalhospitalbentota.com</a></p>
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
                                        <h5>Address</h5>
                                        <p>Divisional Hospital, Bentota</p></a>
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
    <script src="./js/smoothscroll.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/custom.js"></script>

</body>
</html>

