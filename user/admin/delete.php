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
    <title>Delete Profile</title>
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
    <a class="navbar-brand" href="../../">Regional Hospital, Bentota</a>
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
                <a class="dropdown-item" href="./create.php">Create Profile</a>
                <a class="dropdown-item" href="./adminedit.php">Edit Profile</a>
                <a class="dropdown-item active" href="./delete.php">Delete Profile</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            View Profile
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Doctor</a>
                <a class="dropdown-item" href="#">Nurse</a>
                <a class="dropdown-item" href="#">Dispenser</a>
                <a class="dropdown-item" href="#">Pharmacist</a>
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
<br>
<br>

   <div class="container text-center">
        <h3>Delete Profile</h3>
        <hr>
        <div class = "row">
            <div class = "col-lg-4 col-md-4 col-sm-4"></div>
            <div class = "col-lg-4 col-md-4 col-sm-4">
                <form name="doclog" action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
                    <div class="form-group row">
                        <label for="userid" class="col-sm-4 col-form-label"><h5>User ID</h5></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control form-control-sm" name="userid" id="userid" placeholder="Enter User ID" required autofocus>
                        </div>
                    </div>
                    <input type="submit" value="Delete Profile" class="btn btn-primary btn-lg" name="submit">
                </form>
            </div>
            <div class = "col-lg-4 col-md-4 col-sm-4"></div>
        </div>
    </div>

<br>
<br>
<br>
<br>
<br>


<?php
    include '../../footer.php';
?>
</body>

</html>

<?php
	if (null !==(filter_input(INPUT_POST, 'submit'))){
        $userid=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'userid'));
        include './function.php';  
        $list = returnFlag($userid);
        $sql1 = "DELETE FROM `$list[0]` WHERE `$list[1]`='$userid';";
        $sql1 .= "DELETE FROM user WHERE userid='$userid';";
        $result2 = mysqli_multi_query($conn,$sql1);
        if (!$result2){
            echo "<script>alert(\"Error Occured!\");</script>";
        }else {
            echo "<script>alert(\"Successfully deleted!\");</script>";
        }
    }
?>