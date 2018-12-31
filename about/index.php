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

    <title>Overview</title>

    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    

    <!--MAIN-->
    <link rel="stylesheet" href="../styles.css"/>
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <!-- This page main -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
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
                                    <li><a href="./">Overview</a></li>
                                    <li><a href="./vision.php">Vision & Mission</a></li>
                                </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="../services">Clinic Services</a></li>
                                    <li><a href="../services/opd.php">OPD Services</a></li>
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
  <br>

    <!--HEADER IMAGE-->
    <div class="im">
        <img src="../images/main.jpg" alt="we">
    </div><!--im-->

    <!--CONTENT-->
    <div id="body">
      <div id="contents">
        <div class="headerr">
          <div class="footer">
            <div class="body">
                <h1>Our History..</h1><br>
                <h3><li>In &nbsp Elasto &nbsp PVT &nbsp LTD's &nbsp Mr.Donald &nbsp Gunasekara &nbsp and &nbsp his &nbsp brother &nbsp Wilson &nbsp Gunasekera &nbsp donated &nbsp by &nbsp this &nbsp hospital &nbsp on &nbsp 1977 &nbsp June &nbsp 06.</li><br>
                <li> The &nbsp hospital &nbsp open &nbsp by &nbsp Siva &nbsp Obeysekera &nbsp Health &nbsp ministress &nbsp of &nbsp Sirimavo &nbsp Bandaranaike &nbsp Govt.</li></h3>
            </div><!--body-->
          </div><!--footer-->
        </div><!--headerr-->
      </div><!--contents-->
    </div><!--body-->

    <!--PAGES GALLERY-->
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <h3>Image Gallery</h3>
        </div><!--col-lg-12-->

        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/gallary-1.jpg" class="thumbnail">
            <p>Map</p>
            <img src="../images/gallary-1.jpg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->


        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/gallary-2.jpg" class="thumbnail">
            <p>Map</p>
            <img src="../images/gallary-2.jpg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->


        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/gallary-3.jpg" class="thumbnail">
            <p>Map</p>
            <img src="../images/gallary-3.jpg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->


        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/gallary-4.jpg" class="thumbnail">
            <p>Map</p>
            <img src="../images/gallary-4.jpg"" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->

        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/gallary-5.jpg" class="thumbnail">
            <p>Map</p>
            <img src="../images/gallary-5.jpg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->


        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/6.jpeg" class="thumbnail">
            <p>Map</p>
            <img src="../images/6.jpeg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->


        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/7.jpeg" class="thumbnail">
            <p>Map</p>
            <img src="../images/7.jpeg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->

        
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/8.jpeg" class="thumbnail">
            <p>Map</p>
            <img src="../images/8.jpeg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->

        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/9.jpeg" class="thumbnail">
            <p>Map</p>
            <img src="../images/9.jpeg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->


        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/10.jpeg" class="thumbnail">
            <p>Map</p>
            <img src="../images/10.jpeg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->


        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/11.jpeg" class="thumbnail">
            <p>Map</p>
            <img src="../images/11.jpeg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->

        
        <div class="col-lg-3 col-md-4 col-sm-6">
          <a href="../images/12.jpeg" class="thumbnail">
            <p>Map</p>
            <img src="../images/12.jpeg" alt="1"/>  
          </a>
        </div><!--col-lg-3 col-md-4 col-sm-6-->
                  
        </div><!--row-->      
      </div><!--container-->

    <!-- FOOTER -->
    <footer data-stellar-background-ratio="5">
      <div class="container">
        <div class="row">

            <div class="col-md-4 col-sm-4">
                <div class="footer-thumb"> 
                    <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>    
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

