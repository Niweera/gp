<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 1){
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
    <a class="navbar-brand" href="../../">Regional Hospital, Bentota</a>
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
            Quick Access
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="../create.php">Patients</a>
                <a class="dropdown-item" href="./adminedit.php">Schedule</a>
                <a class="dropdown-item" href="./delete.php">Appointments</a>
                <a class="dropdown-item" href="./delete.php">Inventory</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./docedit.php">Edit Profile</a>
                <a class="dropdown-item active" href="./prescription.php">Prescription Sheet</a>
                <a class="dropdown-item" href="#">Medical Records</a>
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

    <form name="doclog" action="<?php echo $_SERVER['PHP_SELF']?>"  method="post">
        <div class="container">
            <center><h1 style="color:#242424;">Prescription Sheet</h1></center>
        </div>
        <br>
        <br>
        <div class="container border pt-4 bg-light rounded">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">Name of The Drug</th>
                    <th scope="col">Dose</th>
                    <th scope="col">Frequency</th>
                    <th scope="col">Duration</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT drugid, drugname FROM drug;";
                    $result=mysqli_query($conn,$sql);
                    $queryResult=mysqli_num_rows($result);
                    if ($queryResult > 0){
                        while ($row=mysqli_fetch_assoc($result)){
                            $drugid = $row['drugid'];
                            $drugname = $row['drugname'];
                            echo "<tr>";
                            echo "<th style=\"width: 40.00%\" scope=\"row\">".$drugname."</th>";  
                            echo "<td style=\"width: 20.00%\">";
                            echo "<div class=\"row\">";
                            echo "<div class=\"col-md-8\">";
                            echo "<input type=\"text\" class=\"form-control form-control-sm\" name=".$drugid."1 value=\"500\" autofocus>";
                            echo "</div>";
                            echo "<div class=\"col-md-4 pl-0\"><p>mg</p></div></div></td>";
                            echo "<td style=\"width: 20.00%\">";
                            echo "<input type=\"text\" class=\"form-control form-control-sm\" name=".$drugid."2>";
                            echo "</td>";
                            echo "<td style=\"width: 20.00%\">";
                            echo "<input type=\"text\" class=\"form-control form-control-sm\" name=".$drugid."3>";   
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
        <br>
        <br>
        <center><input type="submit" value="Submit Prescription" class="btn btn-primary btn-lg" name="submit"></center>
    </form>



    <br>
<?php
    include '../../footer.php';
?>
</body>

</html>


<?php/*
    if (null !==(filter_input(INPUT_POST, 'submit'))){
        $userid = $_SESSION['userid'];
        $name = filter_input(INPUT_POST,'name');
        $contactno = filter_input(INPUT_POST,'contactno');
        $email = filter_input(INPUT_POST,'email');
        $password = filter_input(INPUT_POST,'password');
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "UPDATE user SET password='$hashed_password' WHERE userid='$userid';";
        $sql .= "UPDATE doctor SET name='$name',email='$email',contactno='$contactno' WHERE slmcid='$userid';";
        
        $mysqli_query = mysqli_multi_query($conn, $sql);
       
        if (!$mysqli_query){
                    echo "<script>alert(\"Error Occured!\");</script>";
                }else {
                    $_SESSION['name'] = $name;
                    $_SESSION['email'] = $email;
                    $_SESSION['contactno'] = $contactno;
                    echo "<script>alert(\"Successfully Updated! Please refresh the browser to see the changes.\");</script>";

                }
    }*/
?>