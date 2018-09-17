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

<?php
if (null !==(filter_input(INPUT_POST, 'submit'))){
$clinicno = filter_input(INPUT_POST,'clinicno');
$sql0 = "SELECT clinicno FROM patient WHERE clinicno = '".$clinicno."';";
$result0 = mysqli_query($conn,$sql0);
$queryResult0 = mysqli_num_rows($result0);
if ($queryResult0 > 0){
 ?>
<?php
if (isset($_POST['name']) && isset($_POST['age']) && isset($_POST['contactno'])){
    $name = $_POST['name'];
    $age = $_POST['age'];
    $contactno = $_POST['contactno'];
}

if (null !==(filter_input(INPUT_POST, 'submit'))){
    $slmcid = $_SESSION['userid'];
    $clinicno = filter_input(INPUT_POST,'clinicno');
    
    $sql = "SELECT drugid, drugname FROM drug;";
    $result=mysqli_query($conn,$sql);
    $queryResult=mysqli_num_rows($result);
    if ($queryResult > 0){
        $test = 0;
        while ($row=mysqli_fetch_assoc($result)){
            $drugid = $row['drugid'];
            $d = filter_input(INPUT_POST,$drugid."d");
            $dose=mysqli_real_escape_string($conn,$d);
            $f = filter_input(INPUT_POST,$drugid."f");
            $frequency=mysqli_real_escape_string($conn,$f);
            $du = filter_input(INPUT_POST,$drugid."u");
            $duration=mysqli_real_escape_string($conn,$du);
            if ($d != ""){
                $sql0 = "INSERT INTO prescription (slmcid, clinicno, drugid, dose, frequency, duration) VALUES ('$slmcid','$clinicno','$drugid','$dose','$frequency','$duration');";
                $mysqli_query = mysqli_query($conn, $sql0);
                
                if ($mysqli_query){
                    $test++;
                }
            }else{
                $test++;
            }
        }
        if ($test != 11){
            echo "<script>alert(\"Error Occured! Please insert the data again.\");window.location.href = './prescription.php';</script>";
        }
    }
    
}else{
    echo "<script>alert(\"Go To Prescription Page to continue!\");window.location.href = './prescription.php';</script>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie-edge">
    <title>Print Prescription Sheet</title>
    <link rel="shortcut icon" type="image/png" href="https://www.niwder.me/tvdb/logo.jpg"/>
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
        <div class="container border border-dark rounded">
            <div class="row">
                <div class="col-md-12 bg-light border border-dark">
                    <h1 class="text-center">Divisional Hospital, Bentota</h1>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6">
                    <label class="h4"><strong>Clinic No: </strong><?php echo $clinicno; ?></label>
                </div>
                <div class="col-md-6">
                    <label class="h4"><strong>Name: </strong><?php if (isset($name)){echo $name; }?></label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label class="h4"><strong>Age: </strong><?php echo $age; ?></label>
                </div>
                <div class="col-md-6">
                    <label class="h4"><strong>Contact No: </strong><?php echo "0".$contactno; ?></label>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <img src="../../sourcefiles/rx.jpg" style="width:80px;height:80px" class="rounded float-left" alt="Rx">
                </div>
                <div class="col-md-6">
                    <label class="h4"><strong>Date: </strong><?php echo date("d-m-Y"); ?></label>
                </div>
            </div>
            <hr>
            <table class="table">
                <thead class="thead-light">
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
                            
                            $d = filter_input(INPUT_POST,$drugid."d");
                            if ($d != ""){
                                echo "<tr>";
                                echo "<th style=\"width: 40.00%\" scope=\"row\">".$drugname."</th>";  
                                echo "<td style=\"width: 20.00%\">";
                                echo "<div class=\"row\">";
                                echo "<div class=\"col-md-8\">";
                                echo "<input type=\"text\" class=\"form-control form-control-sm\" value=".$d.">";
                                echo "</div>";
                                echo "<div class=\"col-md-4 pl-0\"><p>mg</p></div></div></td>";
                                echo "<td style=\"width: 20.00%\">";
                                $f = filter_input(INPUT_POST,$drugid."f");
                                echo "<input type=\"text\" class=\"form-control form-control-sm\" value=".$f.">";
                                echo "</td>";
                                echo "<td style=\"width: 20.00%\">";
                                $du = filter_input(INPUT_POST,$drugid."u");
                                echo "<p class=\"form-control form-control-sm\">".$du."</p>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        }
                    }
        
                ?>
                </tbody>
            </table>
            <hr>
            <div class="row">
                <div class="col-md-8"></div>
                <div class="col-md-4">
                    <br>
                    <hr>
                    <p class="text-center"><strong><?php echo $_SESSION['name']; ?><strong></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <button id="printbutton" class="btn btn-primary btn-lg mr-2" onclick="printContent('printthis')">Print Content</button>
                <button  class="btn btn-primary btn-lg ml-2" onclick="window.location.href='./prescription.php'">Go Back</button>
            </div>
        </div>
    </div>
    
    <!--JS files needed for bootstrap to work-->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>

<?php }else{
    //echo "<script>alert('works!)</script>";
    echo "<script>alert(\"Go To Prescription Page to continue!\");window.location.href = './prescription.php';</script>";
}
}else{
    echo "<script>alert(\"Go To Prescription Page to continue!\");window.location.href = './prescription.php';</script>";
}
?>


<?php
mysqli_close($conn);
?>

