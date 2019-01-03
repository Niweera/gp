<?php
	session_start();
    include './dbconf/dbh.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <title>Home</title>

    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!--MAIN-->
    <link rel="stylesheet" href="./styles.css">
    <link rel="stylesheet" href="css/tooplate-style.css"> 
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
                    <a href="./" class="navbar-brand"><i class="fa fa-h-square"></i>&nbsp &nbsp Divisional Hospital, Bentota</a>
                </div><!--navbar-header-->

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-right">

                      <li class="nav-item">
                        <a class="nav-link active" href="<?php if (isset($_SESSION['userid'])) {include './homelink.php';}else{echo "./";}?>"><?php if (isset($_SESSION['userid'])) { include './homename.php';}else{echo "";}?> Home<span class="sr-only">(current)</span></a>
                      </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="./about">Overview</a></li>
                                <li><a href="./about/vision.php">Vision & Mission</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="./services">Clinic Services</a></li>
                                <li><a href="./services/opd.php">OPD Services</a></li>
                            </ul>
                        </li>

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

<br>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>  
          </div><!--spinner-->
     </section><!--preloader-->

     <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3></h3>
                                             <h1>Welcome to Divisional Hospital Bentota</h1>
                                        </div><!--col-md-offset-1 col-md-10-->
                                   </div><!--caption-->
                              </div><!--item item-first-->

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3></h3>
                                             <h1>Welcome to Divisional Hospital Bentota</h1>    
                                        </div><!--col-md-offset-1 col-md-10-->
                                   </div><!--caption-->
                              </div><!--item item-second-->

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h3></h3>
                                             <h1>Welcome to Divisional Hospital Bentota</h1>
                                        </div><!--col-md-offset-1 col-md-10-->
                                   </div><!--caption-->
                              </div><!--item item-third-->
                         </div><!--owl-carousel owl-theme-->

               </div><!--row-->
          </div><!--container-->
     </section><!--home-->

   <!-- ABOUT -->
     <section id="about">
          <div class="container">
               <div class="row">
                    <div class="col-md-6 col-sm-6">
                         <div class="about-info">
                              <h2 class="wow fadeInUp" data-wow-delay="0.6s">Welcome to Divisional<br> <i class="fa fa-h-square"></i>ospital Bentota</h2>
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <p>Divisional Hospital of Bentota also known as Gunasekara Memorial Hospital is in the heart of Bentota town. Since its establishment in 1977, the hospital has been a blessing to the local people as well as foreigns.</p> 
                                   <p>The kind hearted staff of the hospital and the enthusiastic nature of them has proven that this hospital is providing good public service.</p>
                              </div><!--wow fadeInUp-->
                         </div><!--about-info-->
                    </div><!--col-md-6 col-sm-6-->                    
               </div><!--row-->
          </div><!--container-->
     </section><!--about-->


     <!-- GOOGLE MAP -->
     <section id="google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7700428822654!2d79.99731371431461!3d6.42358499535247!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae22e9a563588b5%3A0xdf5ab81622564e9b!2sGovernment+Hospital+Bentota!5e0!3m2!1sen!2slk!4v1537003110727" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>  
     </section><!--google-map-->   


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
                              </div><!--opening-hours-->
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
                                        <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
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
                              </div><!--angle-up-btn"-->
                         </div><!--col-md-2 col-sm-2 text-align-center-->   
                    </div><!--col-md-12 col-sm-12 border-top-->
               </div><!--row-->
          </div><!--container-->
     </footer>        

     <!-- SCRIPTS -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="js/jquery.sticky.js"></script>
     <script src="js/jquery.stellar.min.js"></script>
     <script src="js/wow.min.js"></script>
     <script src="js/smoothscroll.js"></script>
     <script src="js/owl.carousel.min.js"></script>
     <script src="js/custom.js"></script>

</body>
</html>

