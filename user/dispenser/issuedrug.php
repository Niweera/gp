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
if (null !==(filter_input(INPUT_POST, 'update'))){
    $drugarray = $_SESSION['drugarray'];
    $test = 0;
    foreach(array_keys($drugarray) as $key){
        $oldcount = $drugarray[$key];
        $sql="UPDATE drug SET count = count - '".$oldcount."' WHERE drugid = '".$key."';";
        $result = mysqli_query($conn,$sql);
        if ($result){
            $test++;
        }
    }
    if ($test == count($drugarray)){
        $_SESSION['drugarray'] = array();
        echo "<script>alert('Drug inventory updated successfully! Redirecting to Drug Issue Page...');window.location.href = './drugissue.php';</script>";
    }else{
        echo "<script>alert('Error Occured!');window.location.href = './drugissue.php';</script>";
    }

}else{
    echo "<script>alert('Go to Drug Issue page to continue.');window.location.href = './drugissue.php';</script>";  
}

?>


<?php
mysqli_close($conn);
?>