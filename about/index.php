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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/owl.carousel.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <!--MAIN-->
    <link rel="stylesheet" href="../styles.css"/>
    <link rel="stylesheet" href="main.css">
   



</head>
<body>
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
    <a class="navbar-brand" href="./">Regional Hospital, Bentota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="<?php if (isset($_SESSION['userid'])) {include './homelink.php';}else{echo "../";}?>"><?php if (isset($_SESSION['userid'])) { include '../homename.php';}else{echo "";}?> Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="./about">Overview</a>
                <a class="dropdown-item" href="#">Vision & Mission</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Services
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Clinic Services</a>
                <a class="dropdown-item" href="#">OPD Services</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./#">Contact Details</a>
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
    </div>
</nav>
<!--End of the Header navigation bar for the website-->
<br>
 <!-- HOME -->
     <section id="home" class="slider" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                         <div class="owl-carousel owl-theme">
                              <div class="item item-first">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h1>Your Hospital</h1>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-second">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h1>New Lifestyle</h1>
                                        </div>
                                   </div>
                              </div>

                              <div class="item item-third">
                                   <div class="caption">
                                        <div class="col-md-offset-1 col-md-10">
                                             <h1>Healthy Living</h1>
                                        </div>
                                   </div>
                              </div>
                         </div>

               </div>
          </div>
     </section>

	<div class="column">
		<div class="column-1">
			<h2>History</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
		</div><!--column-1-->
		<div class="column-1">
			<h2>History</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br>
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
<br>

 <!-- SCRIPTS -->
     <script src="../js/jquery.js"></script>
     <script src="../js/bootstrap.min.js"></script>
     <script src="../js/jquery.sticky.js"></script>
     <script src="../js/jquery.stellar.min.js"></script>
     <script src="../js/wow.min.js"></script>
     <script src="../js/smoothscroll.js"></script>
     <script src="../js/owl.carousel.min.js"></script>
     <script src="../js/custom.js"></script>

<br>
<?php
	include '../footer.php';
?>
