<?php
    function returnName($username) {
        
        $sql = "SELECT name FROM admin WHERE adminid = '$username'";
        $sql1 = "SELECT name FROM doctor WHERE slmcid = '$username'";
        $sql2 = "SELECT name FROM dispenser WHERE dispid = '$username'";
        $sql3 = "SELECT name FROM pharmacist WHERE pharmaid = '$username'";
        $sql4 = "SELECT name FROM nurse WHERE nurseid = '$username'";
        $sql5 = "SELECT name FROM patient WHERE clinicno = '$username'";
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
                $name = $row['name'];
                return $name;   
            }
        }
        elseif ($count1 == 1){
            while ($row=mysqli_fetch_assoc($res1)){
                $name1 = $row['name'];
                return $name1;   
            }
        }
        elseif ($count2 == 1){
            while ($row=mysqli_fetch_assoc($res2)){
                $name2 = $row['name'];
                return $name2;   
            }
        }
        elseif ($count3 == 1){
            while ($row=mysqli_fetch_assoc($res3)){
                $name3 = $row['name'];
                return $name3;   
            }
        }
        elseif ($count4 == 1){
            while ($row=mysqli_fetch_assoc($res4)){
                $name4 = $row['name'];
                return $name4;   
            }
        }
        elseif ($count5 == 1){
            while ($row=mysqli_fetch_assoc($res5)){
                $name5 = $row['name'];
                return $name5;   
            }
        }
        else{
            return "";
        }
    }
?>