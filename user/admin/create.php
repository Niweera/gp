<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 0){
                header('location: ../../login');	 	
            }
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Create Profile</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="script.js"></script>
</head>
<body>
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
    <a class="navbar-brand" href="../../">Divisional Hospital, Bentota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link active" href="./">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Administration
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="./create.php">Create Profile</a>
                <a class="dropdown-item" href="./adminview.php">View Profile</a>
                <a class="dropdown-item" href="./adminedit.php">Edit Profile</a>
                <a class="dropdown-item" href="./delete.php">Delete Profile</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./#">Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../logout">Logout</a>
        </li>
        </ul>
    </div>
</nav>
<!--End of the Header navigation bar for the website-->
<br>
<br>
<br>

   <div class="container text-center">
        <h3>Registration</h3>
        <hr>
        <div class = "row">
            <div class = "col-lg-4 col-md-4 col-sm-4"></div>
            <div class = "col-lg-4 col-md-4 col-sm-4">
                <div class="list-group">
                    <a href="./adminreg.php" class="list-group-item list-group-item-action w-100"><strong>Administrator</strong></a>
                    <a href="./doctorreg.php" class="list-group-item list-group-item-action w-100"><strong>Doctor</strong></a>
                    <a href="./dispreg.php" class="list-group-item list-group-item-action w-100"><strong>Dispenser</strong></a>
                    <a href="./pharmareg.php" class="list-group-item list-group-item-action w-100"><strong>Pharmacist</strong></a>
                    <a href="./nursereg.php" class="list-group-item list-group-item-action w-100"><strong>Nurse</strong></a>
                </div>
            </div>
            <div class = "col-lg-4 col-md-4 col-sm-4"></div>
        </div>
    </div>

<br>
<br>
<br>

<?php
    include '../../footer.php';
?>
</body>

</html>

