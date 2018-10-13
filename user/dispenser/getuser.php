<?php
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
        </div>";


    echo '<form action="./drugissue.php" method="post">';
    echo '<input type="hidden" name="clinicno" value="'.$q.'">';
    echo '<input type="hidden" name="name" value="'.$name.'">';
    echo '<input type="hidden" name="age" value="'.$age.'">';
    echo '<input type="hidden" name="contactno" value="'.$contactno.'">';
    echo '</form>';

    
    

}



mysqli_close($conn);
?>