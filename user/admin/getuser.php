<?php
$qu = filter_input(INPUT_GET,'q');
$conn = mysqli_connect('localhost','root','srilanka','hmsdb');
$q=mysqli_real_escape_string($conn,$qu);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql="SELECT * FROM admin WHERE adminid = '".$q."'";
$result = mysqli_query($conn,$sql);
$queryResult=mysqli_num_rows($result);
if ($queryResult == 1){
    $row = mysqli_fetch_array($result);
    $name =  $row['name'];
    $email =  $row['email'];
    $contactno =  $row['contactno'];
    echo "<div class='container'>
            <div class='row'>
                <label class='col-md-3 col-form-label border'><h5><strong>Name:</strong> ".$name."</h5></label>
                <label class='col-md-6 col-form-label border'><h5><strong>Email:</strong> ".$email."</h5></label>
                <label class='col-md-3 col-form-label border'><h5><strong>Contact No:</strong> 0".$contactno."</h5></label>
            </div>
        </div>";

}

//this file is for getscript.js

mysqli_close($conn);
?>

