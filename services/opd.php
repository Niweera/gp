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
    
    <br>
    <br>

     <img src="../images/opd.jpg" alt="we" width="100%">
    
    <div class="roww">              
        <div class="col-md-6">

            <h5><span style="color: #135cae;"><strong>Room No 1- Medical Examination</strong></span></h5>
                <p>Medical examination for special occasions, local and&nbsp; foreign employment seekers are done at OPD Room 1.&nbsp;</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>&nbsp;Room No 2- Anti Rabies Treatment Unit</strong></span></h5>
                <p>Anti Rabies treatment clinic is conducted on every working day from 8.00am to 6.00pm and on Sunday and Public Holidays till 4pm.</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>&nbsp;Room No 3- Injection Room</strong></span></h5>
                <p>All the injectable at the OPD level are given here</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>&nbsp;Room No 5- Dressing Room</strong></span></h5>
                <p>All the dressing work of old wounds, suture removal are done here.</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>&nbsp;Room No 6-Patient Registration Room</strong></span></h5>
                <p>All the OPD Patient registration and forwarding of OPD registrations to the relevant sections are done here</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>Room No 7-OPD&nbsp; Xray Room</strong></span></h5>
                <p>OPD Xrays are taken here</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>Room No 10- OPD ECG Room</strong></span></h5>
                <p>OPD ECGs are done in this room based on the medical recommendations of OPD Medical Officers.</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>Room No 11- Health Education Unit</strong></span></h5>
                <p>This room host the Health education Unit of the NHSL which is operating from 8.00 am to 4.00pm on working days and 8.00 am to 12noon on Saturdays. Closed on Sundays and Public Holidays.</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>Room No 12,13- Urine Test &amp; Bool Collection Rooms</strong></span></h5>
                <p>All the OPD based Urine and Blood sample testing are done at this room.</p>
                <hr id="mce-hr-marker" />

            <h5><span style="color: #135cae;"><strong>Room No 15- Out Patient Consultation Room</strong></span></h5>
                <p>This room hosts the OPD medical consultation&nbsp; and when you come to obtain OPD treatment this is the place you will be consulted by OPD medical officers and prescribe the relevant treatments/investigations. This is under operation from 8.00 am to 4.00pm on Week days and Saturday &amp; Sundays from 8.00am to 12.00 noon.</p>
                <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 16- Patient admission Room</strong></span></h5>
                <p>The patients who needs inward medical or surgical treatment will be admitted t the wards from this room. This service is 24 hours service.</p>
                <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 18- Surgical Clinic</strong></span></h5>
                <p>In this room VS OPD will conduct a clinic for the OPD patients who underwent surgeries at OPD Theatre from 8.00 am to 12.00 noon and 2.00pm to 4.00pm on week days.</p>

      </div><!--col-md-6-->

      <div class="col-md-6">

          <h5><span style="color: #135cae;"><strong>Room No 21- Leprosy Clinic</strong></span></h5>
              <p>For OPD and Inward patients with Leprosy this clinic is conducted on Week days from 8.00am to 4.00pm.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 22- Psychiatric Clinic</strong></span></h5>
              <p>Except on Sundays every day from 8.00 am to 12pm this clinic is in operation for the psychiatric patients who have obtained treatments from Angoda National Institute of Mental Health. You can obtain the services of Consultant psychiatrists here.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 34- Renal &amp; Transplant Clinic</strong></span></h5>
              <p>This clinic is under operation on very week day from 8.00 am to 12.00 noon and 2.00pm to 4pm except on Fridays for Kidney transplanted patients and renal disease patients. In addition to this a surgical clinic too is hosted here.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 36- Dermatology Clinic</strong></span></h5>
              <p>Except on Wednesdays every week day from 8.00 am to 12.00 noon this clinic will be in operation.<br /> In additionally on every&nbsp; Tuesday and Thursdays a special&nbsp; dermatology clinic is conducted from 1.00 pm to 4.00pm.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 40- Psychological Counselling Room</strong></span></h5>
              <p>On Every Monday from 2.00pm to 4.00pm this counselling service is provided, and if a patient needs further treatments or follow up will be directed to Room 22 &amp; 45.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 41- Diabetic Clinic</strong></span></h5>
              <p>This clinic is in operation on Monday to Friday from 7.30am to 4.00pm, and on Saturday 8.00am to 12pm. A specialist Endocrinologist is available at this clinic for consultation.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room&nbsp; No 43 &amp; 44- OPD Theatre</strong></span></h5>
              <p>In this OPD theatre all the surgeries which can be treated at the OPD level is being carried out by a Consultant Surgeon.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Room No 45- VP OPD Room</strong></span></h5>
              <p>On every week day from 8.00am to 4.00pm this clinic is conducted and a consultant physician is available for the service. Additional Genito Unrinay clinic is also in parallel operation in this room.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Medical Nutrition Clinic</strong></span></h5>
              <p>A medical nutrition clinic is conducted here from 8.00 am to 4.00pm for the inward patients who needs dietary advice.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>Emergency Treatment Unit</strong></span></h5>
              <p>For the patients who needs Emergency medical treatments this unit provides its service in 24 hours per day.</p>
              <hr id="mce-hr-marker" />

          <h5><span style="color: #135cae;"><strong>OPD Pharmacy&nbsp;</strong></span></h5>
              <p>For all the OPD&nbsp; patients who needs drugs will be issued from this room.</p>

        <h5><span style="color: #135cae;"><strong>&nbsp;</strong></span></h5>

      </div><!--col-md-6-->

  </div><!--roww-->


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
    <script src="./js/smoothscroll.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/custom.js"></script>

</body>
</html>

