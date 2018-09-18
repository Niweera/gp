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

<?php
if (null !==(filter_input(INPUT_POST, 'submit'))){
    $clinicno = $_POST['clinicno'];
    $sql0 = "SELECT clinicno FROM patient WHERE clinicno = '".$clinicno."';";
    $result0 = mysqli_query($conn,$sql0);
    $queryResult0 = mysqli_num_rows($result0);
    if ($queryResult0 > 0){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Drug Issue</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="script.js"></script>
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
<body onload="showUser(document.getElementById('strval').value);">
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Inventory Management
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">View Inventory</a>
                <a class="dropdown-item" href="#">Update Inventory</a>
                <a class="dropdown-item" href="#">Add Drugs</a>
                <a class="dropdown-item" href="#">View Messages</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./dispedit.php">Edit Profile</a>
                <a class="dropdown-item active" href="./drugissue.php">Issue Drugs</a>
                <a class="dropdown-item" href="#">View Reports</a>
                <a class="dropdown-item" href="#">Send Reports</a>
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

    <div class="container">
        <center><h1 style="color:#242424;">Issue Drugs</h1></center>
    </div>
    <br>
    <br>
    <div class="container border bg-light rounded">
        <form name="doclog" action="./drug2.php"  method="post">
            <div class="container pt-4 bg-light rounded mt-3">
                <div id="txtHint"></div>
                <?php
                            date_default_timezone_set("Asia/Colombo");
                            $today = date("Y-m-d");
                            $sql0 = "SELECT drug.drugname, prescription.drugid, prescription.slmcid, prescription.frequency, prescription.dose, prescription.duration FROM prescription INNER JOIN drug ON prescription.drugid = drug.drugid WHERE date LIKE '".$today."%' AND clinicno = '".$clinicno."';";
                            $result0 = mysqli_query($conn,$sql0);
                            $queryResult0=mysqli_num_rows($result0);
                            if ($queryResult0 > 0){
                                echo "<br>
                                <table class=\"table\">
                                        <thead class=\"thead-dark\">
                                            <tr>
                                            <th scope=\"col\">Name of The Drug</th>
                                            <th scope=\"col\">Dose</th>
                                            <th scope=\"col\">Frequency</th>
                                            <th scope=\"col\">Duration</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                ";
                                while ($row = mysqli_fetch_array($result0)){
                                    $slmcid = $row['slmcid'];
                                    $drugname = $row['drugname'];
                                    $drugid = $row['drugid'];
                                    $dose = $row['dose'];
                                    $frequency = $row['frequency'];
                                    $duration = $row['duration'];

                                    if ($frequency == "BD"){
                                        $freq = 2;
                                    }elseif ($frequency == "TDS"){
                                        $freq = 3;
                                    }else{
                                        $freq = 1;
                                    }

                                    if ($duration == "4 Weeks"){
                                        $dur = 28;
                                    }elseif ($duration == "2 Weeks"){
                                        $dur = 14;
                                    }else{
                                        $dur = 7;
                                    }

                                    $drugCount = $freq * $dur;
                                    
                                    echo "<tr>";
                                    echo "<th style=\"width: 40.00%\" scope=\"row\">".$drugname."</th>";  
                                    echo "<td style=\"width: 20.00%\">";
                                    echo "<div class=\"row\">";
                                    echo "<div class=\"col-md-8\">";
                                    echo "<input type=\"text\" class=\"form-control form-control-sm\" value=".$dose.">";
                                    echo "</div>";
                                    echo "<div class=\"col-md-4 pl-0\"><p>mg</p></div></div></td>";
                                    echo "<td style=\"width: 20.00%\">";
                                    echo "<input type=\"text\" class=\"form-control form-control-sm\" value=".$frequency.">";
                                    echo "</td>";
                                    echo "<td style=\"width: 20.00%\">";
                                    echo "<p class=\"form-control form-control-sm\">".$duration."</p>";
                                    echo "</td>";
                                    echo "</tr>";

                                    $drugArray[$drugid] = $drugCount;

                                }
                                echo "</tbody>
                                    </table>";
                                
                                $_SESSION['drugarray'] = $drugArray;
                            }else{
                                echo "<script>alert('Patient has no prescription records for today!');window.location.href = './drugissue.php';</script>";  
                            }

                        

                ?>
                <br>
            
                <div class="form-group row mb-3">
                    <div class="col-sm-5"></div>
                    <input type="hidden" value="<?php echo $clinicno; ?>" name="strval" id="strval">
                    <input type="submit" value="Issue Drugs" class="col-md-2 text-center btn btn-primary btn" name="update">
                    <div class="col-sm-5"></div>
                </div>
            </div>    
        </form>
        <div class = "row">
            <div class="col-sm-5"></div>
            <div class="col-sm-4"></div>
            <button  class="col-md-2 text-center btn btn-primary btn mb-2" onclick="window.location.href='./drugissue.php'">Go Back</button>
        </div>
    </div>
<br>
<!--Footer for the website-->
<section id="footer">
		<div class="container">
			<div class="row text-center text-xs-center text-sm-left text-md-left">
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Videos</a></li>
					</ul>
				</div>
				<div class="col-xs-12 col-sm-4 col-md-4">
					<h5>Quick links</h5>
					<ul class="list-unstyled quick-links">
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Home</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>About</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>FAQ</a></li>
						<li><a href="javascript:void();"><i class="fa fa-angle-double-right"></i>Get Started</a></li>
						<li><a href="https://wwwe.sunlimetech.com" title="Design and developed by"><i class="fa fa-angle-double-right"></i>Imprint</a></li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-5">
					<ul class="list-unstyled list-inline social text-center">
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-facebook"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-instagram"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-google-plus"></i></a></li>
						<li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
					</ul>
				</div>
				</hr>
			</div>	
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 mt-2 mt-sm-2 text-center text-white">
                <p>Copyright &copy 2018 Divisional Hospital of Bentota. <span class="h6">&copy All right Reserved.</span><br />Developed by Group 16 of University of Colombo School of Computing.</p>
					
				</div>
				</hr>
			</div>	
		</div>
	</section>
    <!--End of the footer codes-->
    
    <!--JS files needed for bootstrap to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>



<?php 
    }else{
        echo "<script>alert('Patient is not valid! Check the Clinic No and enter agian.');window.location.href = './drugissue.php';</script>";  
    }
}else{
    echo "<script>alert('Go to Drug Issue page to continue.');window.location.href = './drugissue.php';</script>";  
}

?>
<?php
mysqli_close($conn);
?>



