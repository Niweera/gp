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
    <title>Update Inventory</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="updatescript.js"></script><!--ajax file to post the form data-->
    <script src="drugscript.js"></script><!--ajax file for retrieving data-->
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
                <a class="dropdown-item active" href="./updateinventory.php">Update Inventory</a>
                <a class="dropdown-item" href="./adddrugs.php">Add Drugs</a>
                <a class="dropdown-item" href="./sysmessages.php">View Messages</a>
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
        <center><h1 style="color:#242424;">Update Drug Inventory</h1></center>
    </div>
    <br>
    <br>
        
    <div class="container border pt-4 bg-light rounded mt-3 mb-5">
        <form id="myForm" action="./updateinventory.php" method="post">
            <div class="form-group row mt-3">
                <label for="drug" class="col-sm-2 col-form-label"><h5>Drug Name:</h5></label>
                <div class="col-lg-4 mb-1 search-box">
                    <input type="text" class="form-control form-control-sm" name="drugname" id="drugname" placeholder="Enter Drug Name" autocomplete="off" required autofocus>
                    <div id='resultbox' class="result"></div><!--results from drug-search.php is displayed here-->
                </div>
                <label for="drug" class="col-sm-2 col-form-label"><h5>Drug Count:</h5></label>
                <div class="col-lg-4 mb-1 search-box">
                    <input type="number" class="form-control form-control-sm" min="1" step="1" name="drugcount" id="drugcount" placeholder="Enter Drug Count" autocomplete="off" required>
                </div>
            </div>
            <br>
            <input type="hidden" name="dispid" value="<?php echo $_SESSION['userid']; ?>">
            <div class="form-group row mb-5">
                <div class="col-sm-5"></div>
                <button id="updateButton" class="col-md-2 text-center btn btn-info btn mb-2">Update Inventory</button><!--change-->
                <div class="col-sm-5"></div>
            </div>
        </form>
        <?php
        if (isset($_POST['dispid'])){
            $dispid = filter_input(INPUT_POST,'dispid');
            $drugname = filter_input(INPUT_POST,'drugname');
            $drugcount = filter_input(INPUT_POST,'drugcount');
            $drugsql = "SELECT drugid FROM drug WHERE drugname = '$drugname';";
            $drugresult = mysqli_query($conn, $drugsql);
            if(mysqli_num_rows($drugresult) == 1){
                $row = mysqli_fetch_array($drugresult);
                $drugid = $row['drugid']; 
                $sqldelete = "DELETE FROM drugupdate WHERE drugid = '$drugid';";
                $sql = "INSERT INTO drugupdate(dispid,drugid,count) VALUES('$dispid', '$drugid','$drugcount');";
                $updatesql ="UPDATE drug SET count = count + '$drugcount' WHERE drugid = '$drugid';";
                $deleteresult = mysqli_query($conn, $sqldelete);
                $result = mysqli_query($conn, $sql);
                $updateresult = mysqli_query($conn, $updatesql);
                if($deleteresult && $result && $updateresult){
                    echo "<div class='text-center h5'>Successfully Updated!</div><br>";
                }else{
                    echo "<div class='text-center h5'>Error Occured!</div><br>";
                }
            }else{
                echo "<div class='text-center h5'>Please check the drug name again!</div><br>";
            }
        }
        mysqli_close($conn);
        ?>
    </div>    
        
        
        
    

<br>
<?php
    include '../../real_footer.php';
?>
    
    <!--JS files needed for bootstrap to work-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>





