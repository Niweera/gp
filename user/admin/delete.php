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
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="script.js"></script>
    <script src="getscript.js"></script> <!--jquery script for retriving admin ids -->
    <style>
    input[type='number'] {
    -moz-appearance:textfield;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    </style>
</head>
<body>
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0097a7;box-shadow: 0px 0px 12px #828282;"><!--change-->
    <a class="navbar-brand" href="../../">Divisional Hospital, Bentota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="./">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Administration
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./create.php">Create Profile</a>
                <a class="dropdown-item" href="./adminview.php">View Profile</a>
                <a class="dropdown-item" href="./adminedit.php">Edit Profile</a>
                <a class="dropdown-item active" href="./delete.php">Delete Profile</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./viewinventory.php">View Inventory</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../logout">Logout</a>
        </li>
        </ul>
    </div>
</nav>
<!--End of the Header navigation bar for the website-->
<br>

    <div class="container">
        <center><h1 style="color:#242424;">Delete Profile</h1></center>
    </div>
    <br>
    <br>
    <form name="doclog" action="delete.php"  method="post">
        <div class="container border pt-4 bg-light rounded mt-3 mb-5">
            <div class="form-group row mt-3">
                <div class="col-sm-3"></div>
                <label for="userid" class="col-sm-2 col-form-label"><h5>Admin ID:</h5></label>
                <div class="col-lg-4 mb-1 search-box">
                    <input type="text" class="form-control form-control-sm" name="userid" id="userid" placeholder="Enter Admin ID" autocomplete="off" required autofocus>
                    <div id='resultbox' class="result"></div><!--results from backend-search.php is displayed here-->
                </div>
                <div class="col-sm-3"></div>
            </div>
            <div id="txtHint"></div><!--results from getuser.php is displayed here-->
            <br>
            <div class="form-group row mb-5">
                <div class="col-sm-5"></div>
                <input type="submit" value="Delete" class="col-md-2 text-center btn btn-info btn" name="submit" onclick="return confirm('Are you sure?')">
                <div class="col-sm-5"></div>
            </div>
        </div>    
    </form>
    

<br>
<?php
    include '../../real_footer.php';
?>
    
    <!--JS files needed for bootstrap to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<?php
	if (null !==(filter_input(INPUT_POST, 'submit'))){
        $userid=mysqli_real_escape_string($conn,filter_input(INPUT_POST, 'userid'));
        if (isExist($userid,$conn)){ //if the entered username is in the database then delete the profile data
            $sql1 = "DELETE FROM admin WHERE adminid='$userid';";
            $sql1 .= "DELETE FROM user WHERE userid='$userid';"; // run multiple queries at once
            $result2 = mysqli_multi_query($conn,$sql1);
            if (!$result2){
                echo "<script>alert(\"Error Occured!\");</script>";
            }else {
                echo "<script>alert(\"Successfully deleted!\");</script>";
            }
        }else {
            echo "<script>alert(\"Username is not valid. Please check the username again!\");</script>";
        }
    }

    function isExist($username,$conn){ //checking is the entered username is in the database
        $sql="SELECT * FROM admin WHERE adminid = '".$username."'";
        $result = mysqli_query($conn,$sql);
        $queryResult=mysqli_num_rows($result);
        if ($queryResult == 1){
            return True;
        }else{
            return False;
        }
    }
?>
<?php
mysqli_close($conn);
?>