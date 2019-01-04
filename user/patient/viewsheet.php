<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 5){
                header('location: ../../login');	 	
            }
        }
?>

<?php
if (null !==(filter_input(INPUT_POST, 'submit'))){
    $clinicno = $_SESSION['userid'];
    $date = $_POST['date'];
    $sqlcheck = "SELECT * FROM prescription WHERE date LIKE '".$date."%' AND clinicno = '".$clinicno."';";
    $resultcheck = mysqli_query($conn,$sqlcheck);
    $queryResult1 = mysqli_num_rows($resultcheck);
    if ($queryResult1 > 0){
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Print Prescription Sheet</title>
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../../images/favicon.ico"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../styles.css"/>
    <link rel="stylesheet" type="text/css" href="./custom.css"/>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function printContent(el){
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
</head>
<body>

    <div id="printthis" class="container mt-5 mb-5">
        <div class="container border bg-light rounded">
            <div class="row">
                <div class="col-md-12 bg-light border">
                    <h1 class="text-center">Divisional Hospital, Bentota</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label class="h4"><strong>Patient ID: </strong><?php echo $clinicno; ?></label>
                </div>
                <div class="col-md-6">
                    <label class="h4"><strong>Date: </strong><?php echo $date; ?></label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <img src="../../sourcefiles/rx.jpg" style="width:80px;height:80px" class="rounded float-left" alt="Rx">
                </div>
                <div class="col-md-6">
                    
                </div>
            </div>
            <hr>
            <table class="table">
                <thead>
                    <tr class="table-primary">
                    <th scope="col">Name of The Drug</th>
                    <th scope="col">Dose</th>
                    <th scope="col">Frequency</th>
                    <th scope="col">Duration</th>
                    </tr>
                </thead>
                <tbody>
                <?php    
                    $sql = "SELECT drug.drugname, prescription.drugid, prescription.slmcid, prescription.frequency, prescription.dose, prescription.duration FROM prescription INNER JOIN drug ON prescription.drugid = drug.drugid WHERE date LIKE '".$date."%' AND clinicno = '".$clinicno."';";
                    $result=mysqli_query($conn,$sql);
                    $queryResult=mysqli_num_rows($result);
                    if ($queryResult > 0){
                        while ($row=mysqli_fetch_assoc($result)){
                            $drugname = $row['drugname'];
                            $dose = $row['dose'];
                            $frequency = $row['frequency'];
                            $duration = $row['duration'];
                            
                            
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
                            
                        }
                        echo "</tbody>
                        </table>";
                    }
        
                ?>
            <hr>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <button id="printbutton" class="btn btn-info btn-lg mr-2" onclick="printContent('printthis')">Print Content</button>
                <button  class="btn btn-info btn-lg ml-2" onclick="history.go(-1);">Go Back</button>
            </div>
        </div>
    </div>
    
    <!--JS files needed for bootstrap to work-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<?php }else{
    echo "<script>alert(\"You have no presciptions for this day!\");history.go(-1);</script>";
}
}else{
    echo "<script>alert(\"Go To View Medical Records Page to continue!\");history.go(-1);</script>";
}
?>


<?php
mysqli_close($conn);
?>

