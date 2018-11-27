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
?>
<?php
$sql = "SELECT DISTINCT(createtime) FROM pharmdisp WHERE readtime IS NULL LIMIT 1;";
$result = mysqli_query($conn,$sql);
$queryResult=mysqli_num_rows($result);
if ($queryResult > 0){
    $row=mysqli_fetch_assoc($result);
    $createtime = $row['createtime'];
    $time_array = preg_split('/\s+/', $createtime, -1, PREG_SPLIT_NO_EMPTY);
    $createdate = $time_array[0];
    $create_time = $time_array[1];
    $sqlpharm = "SELECT dispenser.name FROM pharmdisp INNER JOIN dispenser ON dispenser.dispid = pharmdisp.dispid WHERE createtime = '$createtime';";
    $resultpharm = mysqli_query($conn,$sqlpharm);
    $rowpharm = mysqli_fetch_assoc($resultpharm);
    $dispname = $rowpharm['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>View Reports</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
                <a class="dropdown-item" href="./viewinventory.php">View Inventory</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./pharmaedit.php">Edit Profile</a>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="./view_reports.php">Reports</a>
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
        <center><h1 style="color:#242424;">View Reports</h1></center>
    </div>
    <br>
    <br>
        
    <div class="container border bg-light rounded">
        <form action = "view_reports.php" method="post">
            <div id="printthis" class="container mt-5 mb-5">
                <div class="container border border-dark rounded">
                    <div class="row">
                        <div class="col-md-12 bg-light border border-dark">
                            <h1 class="text-center">Divisional Hospital, Bentota</h1>
                        </div>
                    </div>
                    <br>
                    <h2 class="text-center">Drug Request Report</h2>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="h4"><strong>Date: </strong><?php echo $createdate; ?></label>
                        </div>
                        <div class="col-md-6">
                            <label class="h4"><strong>Time: </strong><?php echo $create_time; ?></label>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label class="h4"><strong>Dispenser: </strong><?php echo $dispname; ?></label>
                        </div>
                    </div>
                    <hr>
                    <h5>The following drugs and their respective counts are hereby requested.</h5>
                    <br>
                    <table class="table" style="width:50%;margin-left:auto; margin-right:auto;">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">Name of The Drug</th>
                            <th scope="col">Requested Count</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sql0 = "SELECT pharmdisp.dispid,pharmdisp.createtime, pharmdisp.count, drug.drugname FROM pharmdisp INNER JOIN drug ON pharmdisp.drugid = drug.drugid WHERE createtime = '$createtime';";
                            $result0 = mysqli_query($conn,$sql0);
                            $queryResult0=mysqli_num_rows($result0);
                            if ($queryResult0 > 0){
                                while ($row=mysqli_fetch_assoc($result0)){
                                    $drugname = $row['drugname'];
                                    $drugcount = $row['count'];
                                    echo "<tr>";
                                    echo "<th style=\"width: 50.00%\" scope=\"row\">".$drugname."</th>";
                                    echo "<th style=\"width: 50.00%\" scope=\"row\">".$drugcount."</th>";
                                    echo "</tr>";
                                }
                            }
                        ?>
                        </tbody>
                    </table>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    <input type="hidden" value="<?php echo $createtime; ?>" name="createtime">
                    <input type="submit" value="Acknowledge" class="btn btn-primary btn-lg mb-2" name="submit">
                </div>
                <div class="col-md-5"></div>
            </div>               
        </form>
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
<?php
}else{
    $_SESSION['report_status'] = 0;
    echo "<script>window.location.href = './view_reports.php';</script>";
}
?>



