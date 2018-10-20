<?php
    session_start();
    include '../../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../../login');
        exit;
        }else{
            if ($_SESSION['flag'] != 4){
                header('location: ../../login');	 	
            }
        }
?>

<?php
    if (null !==(filter_input(INPUT_POST, 'submit'))){
        $q = filter_input(INPUT_POST,'clinicno');
        $initials = filter_input(INPUT_POST,'initials');
        $surname = filter_input(INPUT_POST,'surname');
        $name = $initials." ".$surname;
        $contactno = filter_input(INPUT_POST,'contactno');
        $gender = filter_input(INPUT_POST,'gender');
        $email = filter_input(INPUT_POST,'email');
        $dob = filter_input(INPUT_POST,'dob');
        $address = filter_input(INPUT_POST,'address');
        $dc = filter_input(INPUT_POST,'clinicd');
        $mc = filter_input(INPUT_POST,'clinicm');
        
        $sql = "UPDATE patient SET name='$name',gender='$gender',dob='$dob',address='$address',dc='$dc',mc='$mc',email='$email',contactno='$contactno' WHERE clinicno='$q';";
        
        $mysqli_query = mysqli_multi_query($conn, $sql);
       
        if (!$mysqli_query){
            echo "<script>alert(\"Error Occured!\");</script>";
        }else{
            echo "<script>alert(\"Successfully updated patient details!\");window.location.href = './patientview.php';</script>";
        }
                    
    }
    



mysqli_close($conn);
?>