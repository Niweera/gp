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
    <link rel="stylesheet" type="text/css" href="../styles.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link rel="stylesheet" href="../css/tooplate-style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

   
  
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
                  <li><a href="../about">Overview</a></li>
                  <li><a href="../about/vission.php">Vission & Mission</a></li>
                  </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Services<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                  <li><a href="./">Clinic Services</a></li>
                  <li><a href="./opd.php">OPD Services</a></li>
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
               </div>

          </div>
     </section>

  <div class="im">
   <img src="../images/walkin-clinic.jpg" alt="we" width="100%">
 </div>

<div id="body">
  <div id="contents">
    <div class="headerr">
      <div class="footer">
        <div class="body">
          <h1>Clinic Services</h1>
          <h3>The National Hospital of Sri Lanka is one of its kind and a unique hospital in Sri Lanka in many ways such as being the final referral centre of the country, largest hospital of Sri Lanka and the south East Asia.</h3>
          <p>It has a bed capacity of 3404  and over 7000 dedicated health staff in providing uninterrupted service to the whole nation. For a single given month more than 5000 Major and Minor surgeries done.<br>The National Hospital has 18 well equipped Intensive Care Units and 17 High Dependency Units located at each major care providing sectors such as Surgical Department and Medical Department. There are 19 surgical theatres under operation. While some Operation theatres are dedicated for certain surgical specialities, some are in operation 24 hours per day.<br>The National hospital of Sri Lanka hosts the countryâ€™s one and only Neuro-trauma Centre . This Centre provides its unique services 24/7 hours.<br>The Accident and Trauma unit in this hospital is the largest of its kind in Sri Lanka, which served immensely during the country's 30 years long war.<br>In 2013 the hospital provided care for 240,000 in-ward patients and 2 million out patients and clinic patients. The National Hospital features many Medical sub specialities in Health care and most of these specialities are only available at NHSL. The service recipients of this National Heritage spans across the entire country.</p>
      </div>
    </div>
  </div>
</div>


<div id="nhsl-nhsl">


    <div class="form-wrapper clinic-search-wrap">


        <form action="./" method="GET" class="form" role="form">
            <div class="row">
                <div class="col-sm-3 clinic-search-type">
                    <label for="">Search by Clinic</label>

                    <div class="form-group">
                                                <select name="ctype" class="form-control">
                            <option selected value="">Clinic</option>
                            <option value='10'>Anaesthesiology</option><option value='11'>Pathology</option><option value='12'>Cardiology</option><option value='16'>Clinical neurophysiology</option><option value='18'>Emergency Medicine</option><option value='19'>Endocrinology</option><option value='20'>Gastroenterology</option><option value='22'>Geriatrics</option><option value='24'>Health Informatics</option><option value='27'>General Medicine</option><option value='30'>Microbiology</option><option value='31'>Nephrology</option><option value='32'>Neurology</option><option value='35'>Vascular Surgery </option><option value='36'>Vascular And Transplant Surgeon Liver And Kidney</option><option value='38'>Urology </option><option value='41'>General Surgery </option><option value='44'>Sports Medicine</option><option value='51'>Rheumatology </option><option value='52'>Respiratory Medicine</option><option value='53'>Radiology </option><option value='56'>Psychiatry </option><option value='57'>Plastic Surgery </option><option value='67'>Parasitology</option><option value='77'>Orthopaedic Surgery </option><option value='82'>Oncology </option><option value='87'>Clinical Nutrition </option><option value='88'>Neurosurgery </option><option value='99'>Hepatobiliary Surgeon</option><option value='100'>Heamatology </option><option value='102'>Genito-Urinary Surgery </option><option value='105'>Gastroenterological Surgery </option><option value='106'>Gastrointestinal Surgery </option><option value='111'>ENT Surgery </option><option value='117'>Dermatology </option><option value='121'>Judicial Medicine</option><option value='128'>Cardiaothoracic Surgery </option><option value='129'>Cardiac Electrophysiology </option><option value='136'>Medical Administration</option><option value='137'>Hospital Administration and related</option><option value='138'>Chamical Pathology</option><option value='139'>Histopathology</option><option value='141'>Transplant Surgery </option><option value='142'>Ambulatory(Burns)</option><option value='143'>Burns</option><option value='144'>Cardio-Heart Rehabilitation</option>                        </select>
                    </div>

                    <input type="hidden" name="task" value="nhsl"/>
                    <input type="hidden" name="option" value="com_nhsl"/>
                    <input type="submit" class="btn btn-primary btn-sm pull-right" value="Search" name="1" />


                </div>
        </form>
        <form action="./" method="GET" class="form" role="form">

            <div class="col-sm-3 clinic-search-type">
                <label for="">Search by Day</label>

                <div class="form-group">
                                        <select name="mday" class="form-control">
                        <option selected>Select</option>


                        <option value='0'>Daily</option><option value='1'>Sunday</option><option value='2'>Monday</option><option value='3'>Tuesday</option><option value='4'>Wednesday</option><option value='5'>Thursday</option><option value='6'>Friday</option><option value='7'>Saturday</option>                    </select>
                </div>

                <input type="hidden" name="task" value="nhsl"/>
                <input type="hidden" name="option" value="com_nhsl"/>
                <input type="submit" class="btn btn-primary btn-sm pull-right" value="Search" name="2" />


            </div>
        </form>
        <form action="./" method="GET" class="form" role="form">
            <div class="col-sm-3 clinic-search-type">
                <label for="">Search by Name</label>

                <div class="form-group">
                    <input id="tags" value="" class="form-control" type="text" name="member"/>
                </div>

                <input type="hidden" name="task" value="nhsl"/>
                <input type="hidden" name="option" value="com_nhsl"/>
                <input type="submit" class="btn btn-primary btn-sm pull-right" value="Search" name="3" />


            </div>
        </form>
        <form action="./" method="GET" class="form" role="form">
            <div class="col-sm-3 clinic-search-type">
                <label for="">Search by Unit</label>

                <div class="form-group">
                                        <select name="unit" class="form-control">
                        <option selected value="">Unit</option>
                        <option value='6'>Department of Cardiology</option><option value='7'>Department of Chemical Pathology</option><option value='8'>Department of General Medicine</option><option value='9'>Department of Heamatology</option><option value='10'>Department of Histopathology</option><option value='11'>Department of Microbiology</option><option value='12'>Department of Neurology</option><option value='13'>Department of Pathology</option><option value='14'>Department of Radiology</option><option value='15'>Department of Rheumatology</option><option value='16'>Department of Surgery</option><option value='17'>ENT Unit</option><option value='18'>Department of Neurosurgery</option><option value='19'>Oncology Unit</option><option value='20'>Accident and Orthopeadic Unit</option><option value='21'>University Medical Unit</option><option value='22'>University Surgical Unit</option><option value='23'>Vascular Surgical Unit</option><option value='24'>Cardiac Electrophysiology Unit</option><option value='25'>Department of Cardiothoracic Surgery</option><option value='26'>Clinical Neurophysiology Unit</option><option value='27'>Clinical Nutrition Unit</option><option value='28'>Department of Dermatology</option><option value='29'>Department of Endocrinology</option><option value='30'>Gastroenterological Surgical Unit</option><option value='31'>Gastroenterology Unit</option><option value='32'>Genitourinary Surgical Unit</option><option value='33'>Geriatric Unit</option><option value='34'>Judicial Medical Services Unit</option><option value='35'>Nephrology and Dialysis Unit</option><option value='36'>Psychiatry Unit</option><option value='37'>Respiratory Medicine Unit</option><option value='38'>Sport Medcine Unit</option><option value='39'>Urology Unit</option><option value='40'>Plastic Surgery Unit</option>                    </select>
                </div>


                <input type="hidden" name="task" value="nhsl"/>
                <input type="hidden" name="option" value="com_nhsl"/>
                <input type="submit" class="btn btn-primary btn-sm pull-right" value="Search" name="4" />


            </div>


    </div>

    </form>
</div>


<?php 
          if (null !==(filter_input(INPUT_POST, '1'))){
            $uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'ctype'));
            $sql = "SELECT Clinic, Consultant, Dat, Tim, Place FROM Clinic WHERE Clinic='$uname';";
            $result=mysqli_query($conn,$sql);
            $queryResult=mysqli_num_rows($result);
            if ($queryResult > 0){
              echo "<br/><p style=\"font-size:18px;text-align:center\">User is available</p>";
              
              echo "<table>";
              echo "<tr><th>Clinic</th><th>Consultant</th><th>Dat</th><th>Tim</th><th>Place</th></tr>";
              while ($row=mysqli_fetch_assoc($result)){
                $uname = $row['Clinic'];
                $cont = $row['Consultant'];
                $dat = $row['Dat'];
                $tim = $row['Tim'];
                $place = $row['Place'];
                echo "<tr><td>".$uname."</td><td>".$cont."</td><td>".$dat."</td><td>".$tim."</td><td>".$place."</td></tr>";    
                }
              echo "</table>";
              
            }else {
              echo "<p style=\"text-align:center\">User not available</p>";
            }
          }

        if (null !==(filter_input(INPUT_POST, '2'))){
            $uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'mday'));
            $sql = "SELECT Clinic, Consultant, Dat, Tim, Place FROM Day WHERE Clinic='$uname';";
            $result=mysqli_query($conn,$sql);
            $queryResult=mysqli_num_rows($result);
            if ($queryResult > 0){
              echo "<br/><p style=\"font-size:18px;text-align:center\">User is available</p>";
              
              echo "<table>";
              echo "<tr><th>Clinic</th><th>Consultant</th><th>Dat</th><th>Tim</th><th>Place</th></tr>";
              while ($row=mysqli_fetch_assoc($result)){
                $uname = $row['Clinic'];
                $cont = $row['Consultant'];
                $dat = $row['Dat'];
                $tim = $row['Tim'];
                $place = $row['Place'];
                echo "<tr><td>".$uname."</td><td>".$cont."</td><td>".$dat."</td><td>".$tim."</td><td>".$place."</td></tr>";    
                }
              echo "</table>";
              
            }else {
              echo "<p style=\"text-align:center\">User not available</p>";
            }
          }

        if (null !==(filter_input(INPUT_POST, '3'))){
            $uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'member'));
            $sql = "SELECT Clinic, Consultant, Dat, Tim, Place FROM Name WHERE Clinic='$uname';";
            $result=mysqli_query($conn,$sql);
            $queryResult=mysqli_num_rows($result);
            if ($queryResult > 0){
              echo "<br/><p style=\"font-size:18px;text-align:center\">User is available</p>";
              
              echo "<table>";
              echo "<tr><th>Clinic</th><th>Consultant</th><th>Dat</th><th>Tim</th><th>Place</th></tr>";
              while ($row=mysqli_fetch_assoc($result)){
                $uname = $row['Clinic'];
                $cont = $row['Consultant'];
                $dat = $row['Dat'];
                $tim = $row['Tim'];
                $place = $row['Place'];
                echo "<tr><td>".$uname."</td><td>".$cont."</td><td>".$dat."</td><td>".$tim."</td><td>".$place."</td></tr>";    
                }
              echo "</table>";
              
            }else {
              echo "<p style=\"text-align:center\">User not available</p>";
            }
          }

        if (null !==(filter_input(INPUT_POST, '4'))){
            $uname=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'unit'));
            $sql = "SELECT Clinic, Consultant, Dat, Tim, Place FROM Unit WHERE Clinic='$uname';";
            $result=mysqli_query($conn,$sql);
            $queryResult=mysqli_num_rows($result);
            if ($queryResult > 0){
              echo "<br/><p style=\"font-size:18px;text-align:center\">User is available</p>";
              
              echo "<table>";
              echo "<tr><th>Clinic</th><th>Consultant</th><th>Dat</th><th>Tim</th><th>Place</th></tr>";
              while ($row=mysqli_fetch_assoc($result)){
                $uname = $row['Clinic'];
                $cont = $row['Consultant'];
                $dat = $row['Dat'];
                $tim = $row['Tim'];
                $place = $row['Place'];
                echo "<tr><td>".$uname."</td><td>".$cont."</td><td>".$dat."</td><td>".$tim."</td><td>".$place."</td></tr>";    
                }
              echo "</table>";
              
            }else {
              echo "<p style=\"text-align:center\">User not available</p>";
            }
          }
      ?>




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
                                        <a href="#"><img src="images/news-image.jpg" class="img-responsive" alt=""></a>
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

