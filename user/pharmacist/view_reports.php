<?php
session_start();
include '../../dbconf/dbh.php';
if(!isset($_SESSION['userid'])){
    header('location: ../../login');
    exit;
    }else{
        if ($_SESSION['flag'] != 3){
            header('location: ../../login');        
        }
    }
$sql = "SELECT DISTINCT(reportid) FROM pharmdisp WHERE readtime IS NULL LIMIT 1;"; //check if there are new reports
$result = mysqli_query($conn,$sql);
$queryResult=mysqli_num_rows($result);
if ($queryResult > 0){
    $_SESSION['report_status'] = 1; //if there is new reports available set 1
}else{
    $_SESSION['report_status'] = 0; //if there is no new reports available set 0
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">

    <title>View Reports</title>

    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="./script.js"></script><!--ajax script for date retrieiving--> 
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Inventory Management
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./viewinventory.php">View Inventory</a>
            </div><!--dropdown-menu-->
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./pharmaedit.php">Edit Profile</a>
            </div><!--dropdown-menu-->
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="./view_reports.php">Reports</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../logout">Logout</a>
        </li>
        </ul>
    </div><!--navbar-collapse collapse w-100 order-3 dual-collapse2-->
</nav>
<!--End of the Header navigation bar for the website-->

<br>
    <?php
    if (null !==(filter_input(INPUT_POST, 'submit'))){ //when the Ackowledge button is pressed in the viewreports.php page
        $reportID = $_POST['reportid'];
        $pharmaid = $_SESSION['userid'];
        $sqlupdate = "UPDATE pharmdisp SET readtime = CURRENT_TIMESTAMP(), pharmaid = '$pharmaid' WHERE reportid = '$reportID';";
        $resultupdate = mysqli_query($conn,$sqlupdate);
        if ($resultupdate){
            $_SESSION['report_status'] = 2;
        }
    }
    ?>

    <div class="container">
        <center><h1 style="color:#242424;">View Reports</h1></center>
    </div><!--container-->
    <br>
    <br>
        
    <div class="container border bg-light rounded">
        <div id="printthis" class="container mt-5 mb-5"> 

                <?php if ($_SESSION['report_status'] == 0){ ?>
                <h5 class="text-center">No new request reports to view!</h5>
                <?php }elseif ($_SESSION['report_status'] == 1){ ?>

                <div class = "row">
                    <div class="col-md-2"></div><!--col-md-2-->
                    <div class="col-md-6">
                        <h5 class="text-center">You have new request reports to view!</h5>
                    </div><!--col-md-6-->
                    <div class="col-md-2">
                        <button  class="btn btn-info btn-sm mb-2" onclick="window.location.href = './viewreports.php';">View</button>
                    </div><!--col-md-2-->
                    <div class="col-md-2"></div><!--col-md-2-->
                </div><!--row-->

                <?php }elseif ($_SESSION['report_status'] == 2){ ?>
                <h5 class="text-center">Report acknowledged!</h5> 
                <?php } ?>
        </div><!--container mt-5 mb-5-->

        <form action="./datedreports.php" method="post">
            <div class="form-group row">
                <div class="col-sm-2"></div><!--col-sm-2-->
                <label for="reportid" class="col-sm-3 col-form-label"><h5>Please enter Report ID:</h5></label>
                <div class="col-lg-4 mb-1 search-box">
                    <input type="text" class="form-control form-control-sm" name="reportid" id="reportid" placeholder="Enter only the Report ID number" autocomplete="off" required autofocus>
                    <div id='resultbox' class="result"></div><!--result from backend-search.php-->
                </div><!--col-lg-4 mb-1 search-box-->
                <div class="col-sm-3"></div>
            </div><!--form-group row-->
            <div class="form-group row mb-5">
                <div class="col-sm-4"></div><!--col-sm-4-->
                <div class="col-sm-2">
                    <input type="submit" value="View Report" class="btn btn-info btn-lg mb-2" name="submit">
                </div><!--col-sm-2-->
                <div class="col-sm-2">
                    <button  class="btn btn-info btn-lg mb-2" onclick="window.location.href = './index.php';">Home</button><!--change-->
                </div><!--col-sm-2-->
                <div class="col-sm-4"></div><!--col-sm-4-->
            </div><!--form-group row mb-5-->
        </form>
    </div><!--container border bg-light rounded-->

<br>
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
mysqli_close($conn);
?>


