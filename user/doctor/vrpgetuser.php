<?php
session_start();
$qu = filter_input(INPUT_GET,'q');
$conn = mysqli_connect('localhost','root','srilanka','hmsdb');
$q=mysqli_real_escape_string($conn,$qu);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql="SELECT * FROM patient WHERE clinicno = '".$q."'";
$result = mysqli_query($conn,$sql);
$queryResult=mysqli_num_rows($result);
if ($queryResult == 1){
    $row = mysqli_fetch_array($result);
    $name =  $row['name'];
    $gender =  $row['gender'];
    $dc =  $row['dc'];
    $mc =  $row['mc'];
    if ($gender == 0){
        $sex = "Female";
    }elseif ($gender == 1){
        $sex = "Male";
    }
    $udob =  $row['dob'];
    $dob = new DateTime($udob);
    $now = new DateTime();
    $difference = $now->diff($dob);
    $age = $difference->y;
    $contactno =  $row['contactno'];
    echo "<div class='container'>
            <div class='row'>
                <label class='col-md-5 col-form-label border'><h5><strong>Name:</strong> ".$name."</h5></label>
                <label class='col-md-2 col-form-label border'><h5><strong>Age:</strong> ".$age."</h5></label>
                <label class='col-md-2 col-form-label border'><h5><strong>Gender:</strong> ".$sex."</h5></label>
                <label class='col-md-3 col-form-label border'><h5><strong>Contact No:</strong> 0".$contactno."</h5></label>
            </div>
    
            <div class='row'>
                <div class='col-md-3'></div>";
                if ($dc ==1 && $mc ==1){
                    echo "<label class='col-md-6 col-form-label border text-center'><h5><strong>Registered Clinics:</strong> Diabetes Clinic & Medical Clinic</h5></label>";
                }elseif ($mc == 1){
                    echo "<label class='col-md-6 col-form-label border text-center'><h5><strong>Registered Clinic:</strong> Medical Clinic</h5></label>";
                }elseif ($dc ==1){
                    echo "<label class='col-md-6 col-form-label border text-center'><h5><strong>Registered Clinic:</strong> Diabetes Clinic</h5></label>";
                }else{
                    echo "<label class='col-md-6 col-form-label border text-center'><h5><strong>Registered Clinic:</strong> N/A</h5></label>";
                }

    echo        "<div class='col-md-3'></div>
            </div>
        </div>";


    echo '<form action="./viewsheet.php" method="post">';
    echo '<input type="hidden" name="name" value="'.$name.'">';
    echo '<input type="hidden" name="age" value="'.$age.'">';
    echo '<input type="hidden" name="contactno" value="'.$contactno.'">';
    echo '</form>';
    echo '<br>';
    $_SESSION['patientid'] = $q;
            
}else{
    echo "<center><label class='col-md-5 col-form-label border'><h5>Patient is not in the database.</h5></label><center>";
}
mysqli_close($conn);

//This backend-search.php file is for view medical records
?>