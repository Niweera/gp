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
    $sqlidcount = "SELECT MAX(reportid) as reportid FROM pharmdisp;";
    $resultcount=mysqli_query($conn,$sqlidcount);
    $queryResultCount=mysqli_num_rows($resultcount);
    if ($queryResultCount == 1){
        $row=mysqli_fetch_assoc($resultcount);
        $newReportID = $row['reportid'] + 1;
    }else{
        $newReportID = 1;
    }
    $dispid = $_SESSION['userid'];
    $sql = "SELECT drugid FROM drug;";
    $result=mysqli_query($conn,$sql);
    $queryResult=mysqli_num_rows($result);
    if ($queryResult > 0){
        while ($row=mysqli_fetch_assoc($result)){
            $drugid = $row['drugid'];
            $d = filter_input(INPUT_POST,$drugid."d");
            $drugcount=mysqli_real_escape_string($conn,$d);
            if ($d != ""){
                $sql0 = "INSERT INTO pharmdisp (dispid, drugid, count,reportid) VALUES ('$dispid','$drugid','$drugcount','$newReportID');";
                $mysqli_query = mysqli_query($conn, $sql0);
            }
        }
    }
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Request Report</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

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
                    <label class="h4"><strong>Date: </strong><?php date_default_timezone_set("Asia/Colombo"); echo date("d-m-Y"); ?></label>
                </div>
                <div class="col-md-6">
                    <label class="h4"><strong>Time: </strong><?php echo date("h:i:sa"); ?></label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="h4"><strong>Dispenser: </strong><?php echo $_SESSION['name']; ?></label>
                </div>
                <div class="col-md-6">
                    <label class="h4"><strong>Report ID: </strong><?php echo "DR".$newReportID; ?></label>
                </div>
            </div>
            <hr>
            <h5>The following drugs and their respective counts are hereby requested.</h5>
            <br>
            <table class="table" style="width:50%;margin-left:auto; margin-right:auto;">
                <thead>
                    <tr class="table-primary">
                    <th scope="col">Name of The Drug</th>
                    <th scope="col">Requested Count</th>
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
                            
                            $d = filter_input(INPUT_POST,$drugid."d");
                            if ($d != ""){
                                echo "<tr>";
                                echo "<th style=\"width: 50.00%\" scope=\"row\">".$drugname."</th>";  
                                echo "<th style=\"width: 50.00%\" scope=\"row\">".$d."</th>";  
                                echo "</tr>";
                            }
                        }
                    }
        
                ?>
                </tbody>
            </table>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <button  class="btn btn-info btn-lg ml-2" onclick="history.go(-1);">Go Back</button>
            </div>
        </div>
    </div>
    
    <!--JS files needed for bootstrap to work-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>



<?php
mysqli_close($conn);
?>

