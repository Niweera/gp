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
    <link rel="stylesheet" href="../styles.css"/>
    <link rel="stylesheet" type="text/css" href="main.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
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
	<div class="head-bar">
		<div class="image1">
			<img src="../sourcefiles/RHB.png" alt="about" width="1500px;" height="400px;">
		</div><!--image1-->
	</div><!--head-bar-->
	<div class="column">
		<div class="column-1">
			<h2>History</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div><!--column-1-->
		<div class="column-1">
			<h2>History</h2>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div><!--column-1-->
		<div class="column-2">
			<h2>Responsive Image Gallery</h2>
			<div class="responsive">
 			 <div class="gallery">
    			<a target="_blank" href="img_5terre.jpg">
      			<img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
    			</a>
  			</div>
			</div>
			<div class="responsive">
 			 <div class="gallery">
    			<a target="_blank" href="img_5terre.jpg">
      			<img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
    			</a>
  			</div>
			</div>
			<div class="responsive">
 			 <div class="gallery">
    			<a target="_blank" href="img_5terre.jpg">
      			<img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
    			</a>
  			</div>
			</div>
			<div class="responsive">
 			 <div class="gallery">
    			<a target="_blank" href="img_5terre.jpg">
      			<img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
    			</a>
  			</div>
			</div>
		</div><!--column-2-->
	</div><!--column-->
<br>
<div class="column">
        <div class="column-1">
            <h2>History</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div><!--column-1-->
        <div class="column-1">
            <h2>History</h2>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        </div><!--column-1-->
        <div class="column-2">
            <h2>Responsive Image Gallery</h2>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="img_5terre.jpg">
                <img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="img_5terre.jpg">
                <img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="img_5terre.jpg">
                <img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
            <div class="responsive">
             <div class="gallery">
                <a target="_blank" href="img_5terre.jpg">
                <img src="img_5terre.jpg" alt="Cinque Terre" width="600" height="400">
                </a>
            </div>
            </div>
        </div><!--column-2-->
    </div><!--column-->
<br>
<?php
	include '../footer.php';
?>
