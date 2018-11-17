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
    <title>Edit Profile</title>
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
            <a class="nav-link" href="./">Home<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User Administration
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./create.php">Create Profile</a>
                <a class="dropdown-item" href="./adminview.php">View Profile</a>
                <a class="dropdown-item active" href="./adminedit.php">Edit Profile</a>
                <a class="dropdown-item" href="./delete.php">Delete Profile</a>
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

    <form name="doclog" action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
        <div class="container">
            <center><h1 style="color:#242424;">Edit Administrator Profile</h1></center>
        </div>
        <br>
        <br>
        <div class="container border pt-4 bg-light rounded">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label"><h5>Name</h5></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Enter Name" value="<?php echo $_SESSION['name'];?>" autocomplete="off" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label"><h5>Email</h5></label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Enter Email" value="<?php echo $_SESSION['email'];?>" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contactno" class="col-sm-4 col-form-label"><h5>Telephone Number</h5></label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" name="contactno" id="contactno" placeholder="Enter Telephone Number" value = "<?php echo $_SESSION['contactno'];?>" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label"><h5>Password</h5></label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control form-control-sm" name="password" id="password" placeholder="Enter Password" onkeyup='check();' required autofocus>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="repassword" class="col-sm-4 col-form-label"><h5>Re-enter Password</h5></label>
                        <div class="col-lg-8">
                            <input type="password" class="form-control form-control-sm" name="repassword" id="repassword" placeholder="Re-enter Password" onkeyup='check();' required autofocus>
                            <div class="mt-2" id='message'></div>
                        </div>
                    </div> 
                </div>
            </div>
            <center> <input type="submit" value="Edit Profile" class="btn btn-primary btn-lg" name="submit"> </center>   
            <br>
        </div>
        <br>
        <br>
          
        <br>
        <br>
    </form>



    <br>
<?php
    include '../../footer.php';
?>
</body>

</html>


<?php
    if (null !==(filter_input(INPUT_POST, 'submit'))){
        $userid = $_SESSION['userid'];
        $name = filter_input(INPUT_POST,'name');
        $contactno = filter_input(INPUT_POST,'contactno');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE user SET password='$hashed_password' WHERE userid='$userid';";
        $sql .= "UPDATE admin SET name='$name',email='$email',contactno='$contactno' WHERE adminid='$userid';";
        
        $mysqli_query = mysqli_multi_query($conn, $sql);
       
        if (!$mysqli_query){
                    echo "<script>alert(\"Error Occured!\");</script>";
                }else {
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['contactno'] = $contactno;
                    echo "<script>alert(\"Successfully Updated! Please refresh the browser to see the changes.\");</script>";

                }
    }
?>