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
    <title>Drug Request Report</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Quick Links
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="./dispedit.php">Edit Profile</a>
                <a class="dropdown-item" href="./drugissue.php">Issue Drugs</a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Reports
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item active" href="./sendreports.php">Send Reports</a>
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
            <h1 style="color:#242424;" class="text-center">Drug Inventory Report <br></h1><hr><h2 style="color:#242424;" class="text-center">Request Drugs Form</h2>
        </div>
        <br>
        <br>
        <?php
        $sql = "SELECT DISTINCT(reportid) FROM pharmdisp WHERE readtime IS NOT NULL ORDER BY readtime DESC;";
        $result = mysqli_query($conn,$sql);
        $queryResult=mysqli_num_rows($result);
        if ($queryResult > 0){
            echo "<div class=\"container border pt-2 bg-light rounded\" style=\"width:auto;overflow-y: auto;height: 115px;\">";
            while($row=mysqli_fetch_assoc($result)){
                $reportid = $row['reportid'];
                $sqlread = "SELECT pharmacist.name, pharmdisp.createtime, pharmdisp.readtime FROM pharmdisp INNER JOIN pharmacist ON pharmacist.pharmaid = pharmdisp.pharmaid WHERE reportid = '$reportid' LIMIT 1;";
                $resultread = mysqli_query($conn,$sqlread);
                $queryResult=mysqli_num_rows($resultread);
                if ($queryResult > 0){
                    $row=mysqli_fetch_assoc($resultread);
                    $pharmaname = $row['name'];
                    $createtime = $row['createtime'];
                    $readtime = $row['readtime'];
                    echo "<p>The drug request report (Report ID: <b>DR".$reportid."</b>) sent on <b>".$createtime."</b> has acknowledged by <b>".$pharmaname."</b> on <b>".$readtime."</b>.</p>";
                }
            }
            echo "</div><br>";
        }
        ?>
        <div class="container border pt-4 bg-light rounded">
            <table class="table">
                <thead>
                    <tr class="table-primary"><!--change-->
                    <th scope="col">Name of The Drug</th>
                    <th scope="col">Current Drug Count</th>
                    <th scope="col">Request Drug Count</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $sql = "SELECT * FROM drug ORDER BY count ASC;";
                    $result=mysqli_query($conn,$sql);
                    $queryResult=mysqli_num_rows($result);
                    if ($queryResult > 0){
                        while ($row=mysqli_fetch_assoc($result)){
                            $drugid = $row['drugid'];
                            $drugname = $row['drugname'];
                            $drugcount = $row['count'];
                            if ($drugcount < 500){
                                $dangerColor = "#FF0000";
                            }else{
                                $dangerColor = "black";
                            }
                            echo "<tr>";
                            echo "<th style=\"width: 40.00%;color:".$dangerColor."\" scope=\"row\">".$drugname."</th>";  
                            echo "<td style=\"width: 30.00%\">";
                            echo $drugcount;
                            echo "</td>";
                            echo "<td style=\"width: 30.00%\">";
                            echo "<input type=\"number\" min=\"1\" step=\"1\" class=\"form-control form-control-sm\" name=".$drugid."d autofocus>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    }
                ?>
                    <tr>
                        <td colspan="4" style="text-align:center">
                            <input type="submit" value="Send Request Report" class="btn btn-info btn-lg" name="submit"><!--change-->
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <br>
        <br>
    </form>



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



