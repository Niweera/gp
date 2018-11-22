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

    <title>Vision</title>

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

    <!-- This page main-->
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
                         
                      <li><a href="../contact" class="smoothScroll">Contact Details</a></li>

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

      <!--HOME SLIDER-->
      <div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">
          <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="../images/images-1.jpg" alt="">
                <div class="container">
                    <div class="carousel-caption">
                      <h2 class="carousel-title bounceInDown animated slow">Together we can improve their lives</h2>
                    </div> <!--carousel-caption -->
                </div><!--container-->
              </div> <!--item active-->      
          </div><!--carousel-inner-->
      </div><!--homeCarousel-->

    <!--CONTENT-->
    <div id="body">
      <div id="contents">
        <div class="headerr">
          <div class="footer">
            <div class="body">
                <h1>Our Vision</h1>
                <p> Our website templates are created with inspiration, checked for quality and originality and meticulously sliced and coded. What&acute;s more, they&acute;re absolutely free! You can do a lot with them. You can modify them. You can use them to design websites for clients, so long as you agree with the Terms of Use. You can even remove all our links if you want to. </p>

                <h1>Our Mission</h1>
                <p> Looking for more templates? Just browse through all our Free Website Templates and find what you&acute;re looking for. But if you don&acute;t find any website template you can use, you can try our Free Web Design service and tell us all about it. Maybe you&acute;re looking for something different, something special. And we love the challenge of doing something different and something special. </p>

                <h1>Our Mission</h1>
                <p> If you&acute;re experiencing issues and concerns about this website template, join the discussion on our forum and meet other people in the community who share the same interests with you. </p>

                <h1>Our Mission</h1>
                <p> Version 11<br>
                Website Template details, discussion and updates for this Natural Health Web Template. Website Template design by Free Website Templates. Please feel free to remove some or all the text and links of this page and replace it with your own About content. </p>
          </div><!--body-->
        </div><!--footer-->
      </div><!--headerr-->
    </div><!--contents-->
  </div><!--body-->

  <!--FOUNDER-->
  <div class="section-home home-reasons">
      <div class="container">
          <div class="row">

              <div class="col-md-6">
                  <div class="reasons-col animate-onscroll fadeIn">
                      <img src="../images/author-image.jpg" alt="">
                        <div class="reasons-titles">
                            <h3 class="reasons-title">We fight together</h3>
                            <h5 class="reason-subtitle">We are humans</h5>     
                        </div><!--reasons-titles-->

                        <div class="on-hover hidden-xs">
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur praesentium, itaque facilis nesciunt ab omnis cumque similique ipsa veritatis perspiciatis, harum ad at nihil molestias, dignissimos sint consequuntur. Officia, fuga.</p>

                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur praesentium, itaque facilis nesciunt ab omnis cumque similique ipsa veritatis perspiciatis, harum ad at nihil molestias, dignissimos sint consequuntur. Officia, fuga.</p>

                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur praesentium, itaque facilis nesciunt ab omnis cumque similique ipsa veritatis perspiciatis, harum ad at nihil molestias, dignissimos sint consequuntur. Officia, fuga.</p>        
                        </div><!--on-hover hidden-xs-->

                  </div><!--reasons-col animate-onscroll fadeIn-->    
              </div><!--col-md-6-->

              <div class="col-md-6">
                  <div class="reasons-col animate-onscroll fadeIn">
                      <img src="../images/author-image.jpg" alt="">
                        <div class="reasons-titles">
                            <h3 class="reasons-title">WE care about others</h3>
                            <h5 class="reason-subtitle">We are humans</h5>   
                        </div><!--reasons-titles-->

                        <div class="on-hover hidden-xs">
                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur praesentium, itaque facilis nesciunt ab omnis cumque similique ipsa veritatis perspiciatis, harum ad at nihil molestias, dignissimos sint consequuntur. Officia, fuga.</p>

                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur praesentium, itaque facilis nesciunt ab omnis cumque similique ipsa veritatis perspiciatis, harum ad at nihil molestias, dignissimos sint consequuntur. Officia, fuga.</p>

                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur praesentium, itaque facilis nesciunt ab omnis cumque similique ipsa veritatis perspiciatis, harum ad at nihil molestias, dignissimos sint consequuntur. Officia, fuga.</p>                                
                        </div><!--on-hover hidden-xs-->

                  </div><!--reasons-col animate-onscroll fadeIn-->    
              </div><!--col-md-6-->

        </div><!--row-->        
      </div><!--container-->
    </div> <!--section-home home-reasons-->

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

  <!-- Template main javascript -->
  <script src="main.js"></script>

</body>
</html>

