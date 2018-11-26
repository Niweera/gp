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
    <title>DC Prescription Sheet</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="dcscript.js"></script> <!-- Script for the AJAX queries -->
    <script src="dcvalidatescript.js"></script> <!-- Script for form data validation -->
    <style>
    input[type='number'] {
    -moz-appearance:textfield;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
    }
    </style> <!-- Removing the number input styles -->
</head>
<body>
<!--Header navigation bar for the website-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #0097a7;"><!--change-->
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
            Quick Access
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./appointments.php">Appointments</a>
                <a class="dropdown-item" href="./viewinventory.php">Inventory</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./docedit.php">Edit Profile</a>
                <a class="dropdown-item active" href="./dcprescription.php">Diabetes Clinic Prescription</a>
                <a class="dropdown-item" href="./mcprescription.php">Medical Clinic Prescription</a>
                <a class="dropdown-item" href="./viewrecords.php">Medical Records</a>
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

    <form name="doclog" id="dcform" action="./sheet.php"  method="post" onsubmit="return validateForm()">
        <div class="container">
            <center><h1 style="color:#242424;">Diabetes Clinic <br><hr>Prescription Sheet</h1></center>
        </div>
        <br>
        <br>
        <div class="container border pt-4 bg-light rounded">
            <div class="form-group row">
                <div class="col-sm-3"></div>
                <label for="clinicno" class="col-sm-2 col-form-label"><h5>Patient ID:</h5></label>
                <div class="col-lg-4 mb-1 search-box">
                    <input type="text" class="form-control form-control-sm" name="clinicno" id="clinicno" placeholder="Enter Patient ID" autocomplete="off" required autofocus>
                    <div id='resultbox' class="result"></div>
                </div>
                <div class="col-sm-3"></div>
            </div>

            <div id="txtHint"></div>
            <br>
            <div class="form-group row mb-0">
                <div class="col-sm-5"></div>
                <div class="col-sm-3"></div>
                <label for="effectivedate" class="col-sm-2 col-form-label"><h5>Next Clinic Date:</h5></label>
                <div class="col-lg-2">
                    <input type="date" class="form-control form-control-sm" name="effectivedate" id="effectivedate"  autocomplete="off" max="2050-12-31" required>
                </div>
            </div>
            <table class="table">
                <!--<thead class="thead-dark">-->
                <thead>
                    <tr class="table-primary"><!--change-->
                    <th scope="col">Name of The Drug</th>
                    <th scope="col">Dose</th>
                    <th scope="col">Frequency</th>
                    <th scope="col">Duration</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT drugid, drugname,flag FROM drug;";
                    $result=mysqli_query($conn,$sql);
                    $queryResult=mysqli_num_rows($result);
                    if ($queryResult > 0){
                        while ($row=mysqli_fetch_assoc($result)){
                            $flag = $row['flag'];
                            if ($flag == '0' || $flag == '2'){
                                $drugid = $row['drugid'];
                                $drugname = $row['drugname'];
                                echo "<tr>";
                                echo "<th style=\"width: 40.00%\" scope=\"row\">".$drugname."</th>";  
                                echo "<td style=\"width: 20.00%\">";
                                echo "<div class=\"row\">";
                                echo "<div class=\"col-md-8\">";
                                echo "<input type=\"number\" class=\"form-control form-control-sm\" name=".$drugid."d>";
                                echo "</div>";
                                echo "<div class=\"col-md-4 pl-0\"><p>mg</p></div></div></td>";
                                echo "<td style=\"width: 20.00%\">";
                                echo "<select class ='form-control form-control-sm' name=".$drugid."f>";
                                echo '<option selected value="BD">BD</option>';
                                echo '<option value="TDS">TDS</option>';
                                echo '<option value="Mane">Mane</option>';
                                echo '<option value="Nocte">Nocte</option>';
                                echo '<option value="Vesper">Vesper</option>';
                                echo '<option value="Daily">Daily</option>';
                                echo '</select>';
                                echo "</td>";
                                echo "<td style=\"width: 20.00%\">";
                                echo "<select class ='form-control form-control-sm' name=".$drugid."u>";
                                echo '<option selected value="4 Weeks">4 Weeks</option>';
                                echo '<option value="2 Weeks">2 Weeks</option>';
                                echo '<option value="1 Week">1 Week</option>';
                                echo '</select>';
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                    }
                ?>
                    <tr>
                        <td colspan="4" style="text-align:center">
                            <input type="hidden" value="0" name="clinic">
                            <input type="submit" value="Submit Prescription" class="btn btn-info btn-lg" name="submit"><!--change-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <br>
    </form>



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
mysqli_close($conn);
?>



