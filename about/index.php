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

    <title>Home</title>

    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>

     <link rel="stylesheet" href="../css/bootstrap.min.css">
     <link rel="stylesheet" href="../css/font-awesome.min.css">
     <link rel="stylesheet" href="../css/animate.css">
     <link rel="stylesheet" href="../css/owl.carousel.css">
     <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    
    <!--MAIN-->
    <link rel="stylesheet" href="../styles.css"/>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../css/tooplate-style.css">
   



</head>
<body>
 <!-- MENU -->
     <section class="navbar navbar-default navbar-static-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                   
                    <!-- lOGO TEXT HERE -->
                    <a href="../" class="navbar-brand"><i class="fa fa-h-square"></i>&nbsp &nbsp Divisional Hospital, Bentota</a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                         <li class="nav-item">
                            <a class="nav-link" href="<?php if (isset($_SESSION['userid'])) {include '../homelink.php';}else{echo "../";}?>"><?php if (isset($_SESSION['userid'])) { include '../homename.php';}else{echo "";}?> Home<span class="sr-only">(current)</span></a>
                        </li>

                         <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">About Us<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="./about">Overview</a></li>
                                    <li><a href="index-video.html">Vission & Mission</a></li>
                                </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="./about">Clinic Services</a></li>
                                    <li><a href="index-video.html">OPD Services</a></li>
                                </ul>
                        </li>
                         
                         <li><a href="#" class="smoothScroll">Contact Details</a></li>
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
               </div>

          </div>
     </section>
<br>
 <!-- HOME -->
  <div class="head-image">
    <img src="../images/14.jpeg" alt="about">
    <h1>Healthy Living</h1>
  </div>

  <div class="column">
    <div class="column-1">
      <h2>History</h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
    </div><!--column-1-->
    <div class="column-1">
      <h2>History</h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

        </p>
    </div><!--column-1-->
    <div class="column-2">
      <h2>Responsive Image Gallery</h2>
      <div class="responsive">
       <div class="gallery">
          <a target="_blank" href="../images/1.jpeg">
            <img src="../images/1.jpeg" alt="Cinque Terre" width="600" height="400">
          </a>
        </div>
      </div>
      <div class="responsive">
       <div class="gallery">
          <a target="_blank" href="../images/2.jpeg">
            <img src="../images/2.jpeg" alt="Cinque Terre" width="600" height="400">
          </a>
        </div>
      </div>
      <div class="responsive">
       <div class="gallery">
          <a target="_blank" href="../images/3.jpeg">
            <img src="../images/3.jpeg" alt="Cinque Terre" width="600" height="400">
          </a>
        </div>
      </div>
      <div class="responsive">
       <div class="gallery">
          <a target="_blank" href="../images/4.jpeg">
            <img src="../images/4.jpeg" alt="Cinque Terre" width="600" height="400">
          </a>
        </div>
      </div>

            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/5.jpeg">
                <img src="../images/5.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/6.jpeg">
                <img src="../images/6.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/7.jpeg">
                <img src="../images/7.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/8.jpeg">
                <img src="../images/8.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>

            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/9.jpeg">
                <img src="../images/9.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/10.jpeg">
                <img src="../images/10.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/11.jpeg">
                <img src="../images/11.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/12.jpeg">
                <img src="../images/12.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>

            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/13.jpeg">
                <img src="../images/13.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/14.jpeg">
                <img src="../images/14.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/15.jpeg">
                <img src="../images/15.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/16.jpeg">
                <img src="../images/16.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>

            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/17.jpeg">
                <img src="../images/17.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/18.jpeg">
                <img src="../images/18.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/19.jpeg">
                <img src="../images/19.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/20.jpeg">
                <img src="../images/20.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>

            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/21.jpeg">
                <img src="../images/21.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/22.jpeg">
                <img src="../images/22.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/23.jpeg">
                <img src="../images/23.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="../images/24.jpeg">
                <img src="../images/24.jpeg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>


    </div><!--column-2-->
  </div><!--column-->

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
                              </div>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb">
                              <div class="opening-hours">
                                   <h4 class="wow fadeInUp" data-wow-delay="0.4s">Follow Us</h4>
                              </div> 
                              <ul class="social-icon">
                                   <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                   <li><a href="#" class="fa fa-twitter"></a></li>
                                   <li><a href="#" class="fa fa-instagram"></a></li>
                                   <li><a href="#" class="fa fa-google-plus"></a></li>
                              </ul>
                         </div>
                    </div>

                    <div class="col-md-4 col-sm-4"> 
                         <div class="footer-thumb"> 
                              <h4 class="wow fadeInUp" data-wow-delay="0.4s">Our Location</h4>
                              <div class="latest-stories">
                                   <div class="stories-image">
                                        <a href="#"><img src="../images/news-image.jpg" class="img-responsive" alt=""></a>
                                   </div>
                                   <div class="stories-info">
                                        <h5>Address</h5></a>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12 border-top">
                         <div class="col-md-4 col-sm-6">
                              <div class="copyright-text"> 
                                   <p>Copyright &copy; 2018 Divisional Hospital of Bentota. | All right Reserved.</p>
                              </div>
                         </div>
                         <div class="col-md-6 col-sm-6">
                            <div class="copyright-text"> 
                               <p>Developed by Group 16 of University of Colombo School of Computing</p>
                             </div>
                         </div>
                         <div class="col-md-2 col-sm-2 text-align-center">
                              <div class="angle-up-btn"> 
                                  <a href="#top" class="smoothScroll wow fadeInUp" data-wow-delay="1.2s"><i class="fa fa-angle-up"></i></a>
                              </div>
                         </div>   
                    </div>
               </div>
          </div>
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

