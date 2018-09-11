<?php
    function returnEmail($username) {
        
        $sql = "SELECT email FROM admin WHERE adminid = '$username'";
        $sql1 = "SELECT email FROM doctor WHERE slmcid = '$username'";
        $sql2 = "SELECT email FROM dispenser WHERE dispid = '$username'";
        $sql3 = "SELECT email FROM pharmacist WHERE pharmaid = '$username'";
        $sql4 = "SELECT email FROM nurse WHERE nurseid = '$username'";
        $sql5 = "SELECT email FROM patient WHERE clinicno = '$username'";
        include '../dbconf/dbh.php';
        $res = mysqli_query($conn, $sql);
        $res1 = mysqli_query($conn, $sql1);
        $res2 = mysqli_query($conn, $sql2);
        $res3 = mysqli_query($conn, $sql3);
        $res4 = mysqli_query($conn, $sql4);
        $res5 = mysqli_query($conn, $sql5);
        $count = mysqli_num_rows($res);
        $count1 = mysqli_num_rows($res1);
        $count2 = mysqli_num_rows($res2);
        $count3 = mysqli_num_rows($res3);
        $count4 = mysqli_num_rows($res4);
        $count5 = mysqli_num_rows($res5);
        if ($count == 1){
            while ($row=mysqli_fetch_assoc($res)){
                $email = $row['email'];
                return $email;   
            }
        }
        elseif ($count1 == 1){
            while ($row=mysqli_fetch_assoc($res1)){
                $email1 = $row['email'];
                return $email1;   
            }
        }
        elseif ($count2 == 1){
            while ($row=mysqli_fetch_assoc($res2)){
                $email2 = $row['email'];
                return $email2;   
            }
        }
        elseif ($count3 == 1){
            while ($row=mysqli_fetch_assoc($res3)){
                $email3 = $row['email'];
                return $email3;   
            }
        }
        elseif ($count4 == 1){
            while ($row=mysqli_fetch_assoc($res4)){
                $email4 = $row['email'];
                return $email4;   
            }
        }
        elseif ($count5 == 1){
            while ($row=mysqli_fetch_assoc($res5)){
                $email5 = $row['email'];
                return $email5;   
            }
        }
        else{
            return "";
        }
    }
?>