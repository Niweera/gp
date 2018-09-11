<?php
    session_start();
    include '../dbconf/dbh.php';
    if(!isset($_SESSION['userid'])){
        header('location: ../login');
        exit;
        }else{
            if ($_SESSION['flag'] == 0){
                header('location: ./admin');	 	
            }
            elseif ($_SESSION['flag'] == 1){
                header('location: ./doctor');	 	
            }
            elseif ($_SESSION['flag'] == 2){
                header('location: ./dispenser');	 	
            }
            elseif ($_SESSION['flag'] == 3){
                header('location: ./pharmacist');	 	
            }
            elseif ($_SESSION['flag'] == 4){
                header('location: ./nurse');	 	
            }
            elseif ($_SESSION['flag'] == 5){
                header('location: ./patient');	 	
            }
            else{
                header('location: ../login');	 	
            }
        }
?>