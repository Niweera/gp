<?php
	include '../dbconf/dbh.php';
	session_start();
	
	
	if(isset($_POST['submit']))
	{
		if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !=''))
		{
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			
			$sqlEmail = "select * from user where userid = '".$email."'";
			$rs = mysqli_query($conn,$sqlEmail);
			$numRows = mysqli_num_rows($rs);
			
			if($numRows  == 1)
			{
				$row = mysqli_fetch_assoc($rs);
				
				if(password_verify($password,$row['password']))
				{
					session_start();
					$_SESSION['userid'] = $row['userid'];
                    $_SESSION['flag'] = $row['flag'];
                    if ($_SESSION['flag'] == 0){
                        header('location: ../user/admin');
					    exit;
                    }
                    elseif ($_SESSION['flag'] == 1){
                        header('location: ../user/doctor');
					    exit;
                    }
					elseif ($_SESSION['flag'] == 2){
                        header('location: ../user/dispenser');
					    exit;
                    }
                    elseif ($_SESSION['flag'] == 3){
                        header('location: ../user/pharmacist');
					    exit;
                    }
                    elseif ($_SESSION['flag'] == 4){
                        header('location: ../user/nurse');
					    exit;
                    }
                    elseif ($_SESSION['flag'] == 5){
                        header('location: ../user/patient');
					    exit;
                    }
					
				}
				else
				{
					echo "<script>alert(\"Wrong Email Or Password!\");</script>";
				}
			}
			else
			{
				echo "<script>alert(\"No User Found!\");</script>"; 
			}
		}
	}
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
	<link rel="stylesheet" href="./style.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body id="LoginForm">
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #212529;">
    <a class="navbar-brand" href="../">Regional Hospital, Bentota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="../">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            About Us
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../about">Overview</a>
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
            
            <a class="nav-link active" href="#" data-toggle="modal" data-target="#exampleModal">Login</a>
        </li>
        </ul>
    </div>
</nav>
<!--End of the Header navigation bar for the website-->
<!-- login modal codes-->
<div class="container">
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>User Login</h2>
   <p>Please enter your Login ID and Password</p>
   </div>
    <form id="Login" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

        <div class="form-group">


            <input type="text" class="form-control" id="inputEmail" placeholder="Login ID" name="email" required>

        </div>

        <div class="form-group">

            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password" required>

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a>
</div>
        <button type="submit" class="btn btn-primary" name="submit">Login</button>

    </form>
    </div>
</div>
</div>
</div>

	<?php
		include '../footer.php';
	?>