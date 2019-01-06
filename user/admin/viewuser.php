<?php
include './function.php'; 
$qu = filter_input(INPUT_GET,'q');
$conn = mysqli_connect('localhost','root','srilanka','hmsdb');
$q=mysqli_real_escape_string($conn,$qu);
$list = returnFlag($q);
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql="SELECT * FROM `$list[0]` WHERE `$list[1]` = '".$q."'";
$result = mysqli_query($conn,$sql);
if ($result){
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
}else{
    echo "<div class='container'>
            <div class='row'>
                <div class='col-md-3 col-form-label'></div>
                <div class='col-md-6 col-form-label text-center'><h5><strong>User ID is not valid.<strong></h5></div>
                <div class='col-md-3 col-form-label'></div>
            </div>
        </div>";
}

//this file is for viewscript.js

mysqli_close($conn);
?>

