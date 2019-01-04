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
    <title>System Messages</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="viewscript.js"></script><!-- this file is for viewing the new sys msgs from ajax calls-->
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
            Inventory Management
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./viewinventory.php">View Inventory</a>
                <a class="dropdown-item" href="./updateinventory.php">Update Inventory</a>
                <a class="dropdown-item" href="./adddrugs.php">Add Drugs</a>
                <a class="dropdown-item active" href="./sysmessages.php">View Messages</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./dispedit.php">Edit Profile</a>
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

    <div class="container">
        <center><h1 style="color:#242424;">New Messages</h1></center>
    </div>
    <br>
    <br>
    
    <div class="container border pt-4 bg-light rounded mt-3 mb-5">
        <div class="form-group row mt-3">
            <div class="col-sm-3"></div>
            <label for="newdate" class="col-sm-2 col-form-label" id="f"><h5>Search Messages:</h5></label>
            <div class="col-lg-4 mb-1 search-box">
                <input type="text" class="form-control form-control-sm" name="newdate" id="newdate" placeholder="Enter date YYYY-MM-DD" autocomplete="off" autofocus>
            </div>
            <div class="col-sm-3"><button id="newButton" class="col-md-2 text-center btn btn-light btn mb-2"></button></div>
        </div>
        <div id="newresult"></div>
        <div class="form-group row mt-3">
            <div class="col-sm-5"></div>
            <div class="col-sm-2"><button id="okButton" class="text-center btn btn-info btn-block" disabled>OK</button></div><!--change-->
            <div class="col-sm-5"></div>
        </div>
        <br>
    </div>    
    
    <div class="container">
        <center><h1 style="color:#242424;">Viewed Messages</h1></center>
    </div>
    <br>
    <br>
    
    <div class="container border pt-4 bg-light rounded mt-3 mb-5">
        <div class="form-group row mt-3">
            <div class="col-sm-3"></div>
            <label for="readdate" class="col-sm-2 col-form-label"><h5>Search Messages:</h5></label>
            <div class="col-lg-4 mb-1 search-box">
                <input type="text" class="form-control form-control-sm" name="readdate" id="readdate" placeholder="Enter date YYYY-MM-DD" autocomplete="off" autofocus>
            </div>
            <div class="col-sm-3"><button id="readButton" class="col-md-2 text-center btn btn-light btn mb-2"></button></div>
        </div>
        <div id="readresult"></div>
        <br>
    </div>    

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



