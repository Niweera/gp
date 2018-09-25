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
    <link rel="stylesheet" href="../css/style.css" type="text/css">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    
        <!-- Template main Css -->
        <link rel="stylesheet" href="../assets/css/style.css">
        

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
 <div class="im">
   <img src="../images/sliderr-1.jpeg" alt="we">
 </div>

 <div id="body">
  <div id="contents">
    <div class="headerr">
      <div class="footer">
        <div class="body">
          <h1>Our History..</h1>
          <h4>We Have Free Templates for Everyone</h4>
          <p> Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What&acute;s more, they&acute;re absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the Terms of Use. You can even remove all our links if you want to. </p>
          <h4>We Have More Templates for You</h4>
          <p> Looking for more templates? Just browse through all our Free Website Templates and find what you&acute;re looking for. But if you don&acute;t find any website template you can use, you can try our Free Web Design service and tell us all about it. Maybe you&acute;re looking for something different, something special. And we love the challenge of doing something different and something special. </p>
          <h4>Be Part of Our Community</h4>
          <p> If you&acute;re experiencing issues and concerns about this website template, join the discussion on our forum and meet other people in the community who share the same interests with you. </p>
          <h4>Template details</h4>
          <p> Version 11<br>
            Website Template details, discussion and updates for this Natural Health Web Template. Website Template design by Free Website Templates. Please feel free to remove some or all the text and links of this page and replace it with your own About content. </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="main-container">

    <div class="container gallery fadeIn animated">

      <div class="row">
        

          <a href="../images/1.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/1.jpeg" alt="">

            <span class="on-hover">
              <span class="hover-caption">Map</span>
            </span>

          </a> <!-- /.gallery-item -->

          <a href="../images/2.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/2.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/3.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/3.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/4.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/4.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/5.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/5.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/6.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/6.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/7.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/7.jpeg" alt="">

            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>

          </a> <!-- /.gallery-item -->

          <a href="../images/8.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/8.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/9.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/9.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/10.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/10.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/11.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/11.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/12.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/12.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/13.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/13.jpeg" alt="">

            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>

          </a> <!-- /.gallery-item -->

          <a href="../images/14.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/14.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/15.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/15.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/16.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/16.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/17.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/17.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/18.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/18.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/19.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/19.jpeg" alt="">

            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>

          </a> <!-- /.gallery-item -->

          <a href="../images/20.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/20.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/21.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/21.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->


          <a href="../images/22.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/22.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/23.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/23.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->

          <a href="../images/24.jpeg" class="col-md-3 col-sm-4 gallery-item lightbox">

            <img src="../images/24.jpeg" alt="">
            
            <span class="on-hover">
              <span class="hover-caption">Image Caption</span>
            </span>
            
          </a> <!-- /.gallery-item -->
          
          
        
      </div>
      
    </div>


  </div> <!-- /.main-container  -->

 
 

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

