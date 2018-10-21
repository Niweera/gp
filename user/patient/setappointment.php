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


$clinicno = $_SESSION['userid'];
if (null !==(filter_input(INPUT_POST, 'dcappoint'))){
    $clinicArray = $_SESSION['clinicarray'];
    $date = $clinicArray['0'];
    $sqlCount = "SELECT COUNT(appointmentno) AS apno FROM appointment WHERE clinic = '0' and date = '$date';";
    $resultCount = mysqli_query($conn,$sqlCount);
    $queryResultCount = mysqli_num_rows($resultCount);
    if ($queryResultCount == 1){
        $row=mysqli_fetch_assoc($resultCount);
        $appointmentCount = $row['apno'];
        $appointmentCount = $appointmentCount + 1;
        
    }
    $sqlInsert = "INSERT INTO `appointment` (`clinicno`, `clinic`, `date`, `appointmentno`) VALUES ('$clinicno', '0', '$date', '$appointmentCount');";
    $resultInsert = mysqli_query($conn,$sqlInsert);
    if (!$resultInsert){
        echo "<script>alert(\"Error Occured!\");</script>";
    }else{
        echo "<script>history.go(-1);</script>";
    }
}
if (null !==(filter_input(INPUT_POST, 'mcappoint'))){
    $clinicArray = $_SESSION['clinicarray'];
    $date = $clinicArray['1'];
    $sqlCount = "SELECT COUNT(appointmentno) AS apno FROM appointment WHERE clinic = '1' and date = '$date';";
    $resultCount = mysqli_query($conn,$sqlCount);
    $queryResultCount = mysqli_num_rows($resultCount);
    if ($queryResultCount == 1){
        $row=mysqli_fetch_assoc($resultCount);
        $appointmentCount = $row['apno'];
        $appointmentCount = $appointmentCount + 1;
        
    }
    $sqlInsert = "INSERT INTO `appointment` (`clinicno`, `clinic`, `date`, `appointmentno`) VALUES ('$clinicno', '1', '$date', '$appointmentCount');";
    $resultInsert = mysqli_query($conn,$sqlInsert);
    if (!$resultInsert){
        echo "<script>alert(\"Error Occured!\");</script>";
    }else{
        echo "<script>history.go(-1);</script>";
    }
}



/*if (null !==(filter_input(INPUT_POST, 'mcappoint'))){
    $date = $clinicArray['1'];
    $sqlCount = "SELECT COUNT(appointmentno) AS apno FROM appointment WHERE clinic = '1' and date = '$date';";
    $resultCount = mysqli_query($conn,$sqlCount);
    $queryResultCount = mysqli_num_rows($resultCount);
    if ($queryResultCount == 1){
        $row=mysqli_fetch_assoc($resultCount);
        $appointmentCount = $row['apno'];
        echo "$appointmentCount";
        
    }
}*/









mysqli_close($conn);
?>