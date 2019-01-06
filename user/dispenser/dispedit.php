<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 2){
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
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="script.js"></script>
    <script>
        var check = function() {
            if (document.getElementById('password').value == document.getElementById('repassword').value) {
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Password confirmed!';
            } else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = 'Not matching';
            }
        }
    </script>
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Inventory Management
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./viewinventory.php">View Inventory</a>
                <a class="dropdown-item" href="./updateinventory.php">Update Inventory</a>
                <a class="dropdown-item" href="./adddrugs.php">Add Drugs</a>
                <a class="dropdown-item" href="./sysmessages.php">View Messages</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="./dispedit.php">Edit Profile</a>
                <a class="dropdown-item" href="./drugissue.php">Issue Drugs</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reports
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./sendreports.php">Send Reports</a>
            </div>
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
            <center><h1 style="color:#242424;">Edit Dispenser Profile</h1></center>
        </div>
        <br>
        <br>
        <div class="container border pt-4 bg-light rounded">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label"><h5>Dispenser ID</h5></label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control form-control-sm" name="dispid" id="dispid" value="<?php echo $_SESSION['userid'];?>" autocomplete="off" required disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-4 col-form-label"><h5>Name</h5></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control form-control-sm" name="name" id="name" placeholder="Enter Name" value="<?php echo $_SESSION['name'];?>" required autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label"><h5>Email</h5></label>
                        <div class="col-lg-8">
                            <input type="email" class="form-control form-control-sm" name="email" id="email" placeholder="Enter Email" value="<?php echo $_SESSION['email'];?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contactno" class="col-sm-4 col-form-label"><h5>Telephone Number</h5></label>
                        <div class="col-lg-8">
                            <input type="number" class="form-control form-control-sm" name="contactno" id="contactno" min="1" step="1" max="9999999999" placeholder="Enter Telephone Number" autocomplete="off" value = "<?php echo $_SESSION['contactno'];?>" required autofocus>
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
            <center> <input type="submit" value="Edit Profile" class="btn btn-info btn-lg" name="submit"> </center><!--change-->
            <br>
        </div>
        <br>
        <br>
          
        <br>
        <br>
    </form>





    <br>
    <?php
    include '../../real_footer.php';
    include '../../footer.php';
?>


<?php
    if (null !==(filter_input(INPUT_POST, 'submit'))){
        $userid = $_SESSION['userid'];
        $name = filter_input(INPUT_POST,'name');
        $contactno = filter_input(INPUT_POST,'contactno');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE user SET password='$hashed_password' WHERE userid='$userid';";
        $sql .= "UPDATE dispenser SET name='$name',email='$email',contactno='$contactno' WHERE dispid='$userid';";
        
        $mysqli_query = mysqli_multi_query($conn, $sql);
       
        if (!$mysqli_query){
                    echo "<script>alert(\"Error Occured!\");</script>";
                }else {
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['contactno'] = $contactno;
                    echo "<script>alert(\"Successfully Updated!\");window.location.href = './dispedit.php';</script>";

                }
    }


mysqli_close($conn);    
?>