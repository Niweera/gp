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
                <img src="../images/ViMi.jpg">
                <div class="container">
                    <div class="carousel-caption">
                      <h2 class="carousel-title bounceInDown animated slow"></h2>
                    </div> <!--carousel-caption -->
                </div><!--container-->
              </div> <!--item active-->      
          </div><!--carousel-inner-->
      </div><!--homeCarousel-->

    <!--CONTENT-->
   <!-- <div id="body">
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

  <!--<div class="container">
    <div class="reasons-titles">
        <h2>Our Department</h2>    
    </div><!--reasons-titles-->
    <!--<div class="row">
      <div  class="col-md-6">

        <div class="alert alert-success">
          <h4><strong>Lab Test Department</strong></h4>
            <p>The lab at Hospital offers tests covering the full range of medicinal pathology. </p>
        </div><!--alert alert-success-->

         <!--<div class="alert alert-info">
          <h4><strong>Dental Department</strong></h4>
            <p>The Dental Clinic program tremendously affects patients' lives. </p>
        </div><!--alert alert-info-->

         <!--<div class="alert alert-warning">
          <h4><strong>Primary Health</strong></h4>
            <p>Primary healthcare services are provided by general practitioners and nurses in Hospital. </p>
        </div><!--alert alert-warning-->
        
      <!--</div><!--col-md-8-->  

      <!--<div class="col-md-6">
        <img src="../images/images-2.jpg" alt="" width="100%" class="img-rounded">
      </div><!--col-md-6-->

    <!--</div><!--row-->  

    <!--<div class="row">
      <div  class="col-md-6">

        <div class="alert alert-success">
          <h4><strong>Pediatrics Department</strong></h4>
            <p>From that moment your child is born, your goal is to keep them healthy and safe.</p>
        </div><!--alert alert-success-->

         <!--<div class="alert alert-info">
          <h4><strong>Neurology Department</strong></h4>
            <p>The Hospital Department of Neurology is one of the biggest on the planet.</p>
        </div><!--alert alert-info-->

         <!--<div class="alert alert-warning">
          <h4><strong>Gynecology Department</strong></h4>
            <p>Welcome to the Department of Obstetrics and Gynecology at Hospital Clinic.</p>
        </div><!--alert alert-warning-->

      <!--</div><!--col-md-8--> 

      <!--<div class="col-md-6">        
        <img src="../images/department-2.jpg" alt="" width="100%" class="img-rounded">       
      </div><!--col-md-6-->

    <!--</div><!--row-->  
  <!--</div><!--container-->


    <!-- FOOTER -->
    <footer data-stellar-background-ratio="5">
        <div class="container">
            <div class="row">

                  <div class="col-md-4 col-sm-4">
                      <div class="footer-thumb"> 
                          <h4 class="wow fadeInUp" data-wow-delay="0.4s">Contact Info</h4>
                          <div class="contact-info">
                              <p><i class="fa fa-phone"></i>034-2275260</p>
                              <p><i class="fa fa-envelope-o"></i> <a href="#">info@dhbentota.com</a></p>
                          </div><!--contact-info-->

                      </div><!--footer-thumb-->
                  </div><!--col-md-4 col-sm-4-->

                  <div class="col-md-4 col-sm-4"> 
                      <div class="footer-thumb">
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
  <script src="../js/smoothscroll.js"></script>
  <script src="../js/owl.carousel.min.js"></script>
  <script src="../js/custom.js"></script>

  <!-- Template main javascript -->
  <script src="main.js"></script>

</body>
</html>

