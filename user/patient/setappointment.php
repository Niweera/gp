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
    $deleteDate = date('Y-m-d', strtotime($date. ' + 2 days'));
    $sqlInsert = "INSERT INTO `appointment` (`clinicno`, `clinic`, `date`, `appointmentno`) VALUES ('$clinicno', '0', '$date', '$appointmentCount');";
    $sqlEvent = "CREATE EVENT `0-$clinicno-0` ON SCHEDULE AT '$deleteDate' DO DELETE FROM hmsdb.patientrecord WHERE clinicno = '$clinicno' AND clinic = '0';"; //creating an automated task to delete the next clinic date in patientrecords after the clinic is over and passed at least two days 
    $sqlEvent .= "CREATE EVENT `0-$clinicno-1` ON SCHEDULE AT '$deleteDate' DO DELETE FROM hmsdb.appointment WHERE clinicno = '$clinicno' AND clinic = '0';"; //creating an automated task event in mysql db to delete the appointment number and related details after the clinic is over and passed at least two days #SET GLOBAL event_scheduler = ON; use this code in mysql to start event scheduler
    $resultInsert = mysqli_query($conn,$sqlInsert);
    $resultEvent = mysqli_multi_query($conn,$sqlEvent);
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
    $deleteDate = date('Y-m-d', strtotime($date. ' + 2 days'));
    $sqlInsert = "INSERT INTO `appointment` (`clinicno`, `clinic`, `date`, `appointmentno`) VALUES ('$clinicno', '1', '$date', '$appointmentCount');";
    $sqlEvent = "CREATE EVENT `1-$clinicno-0` ON SCHEDULE AT '$deleteDate' DO DELETE FROM hmsdb.patientrecord WHERE clinicno = '$clinicno' AND clinic = '1';"; //creating an automated task to delete the next clinic date in patientrecords after the clinic is over and passed at least two days
    $sqlEvent .= "CREATE EVENT `1-$clinicno-1` ON SCHEDULE AT '$deleteDate' DO DELETE FROM hmsdb.appointment WHERE clinicno = '$clinicno' AND clinic = '1';"; //creating an automated task event in mysql db to delete the appointment number and related details after the clinic is over and passed at least two days #SET GLOBAL event_scheduler = ON; use this code in mysql to start event scheduler
    $resultInsert = mysqli_query($conn,$sqlInsert);
    $resultEvent = mysqli_multi_query($conn,$sqlEvent);
    if (!$resultInsert){
        echo "<script>alert(\"Error Occured!\");</script>";
    }else{
        echo "<script>history.go(-1);</script>";
    }
}


mysqli_close($conn);
?>