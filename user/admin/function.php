<?php
    function returnFlag($userid) {
        $sql0 = "SELECT flag FROM user WHERE userid ='$userid';";
        include '../../dbconf/dbh.php';
        $result0 = mysqli_query($conn,$sql0);
        $queryResult=mysqli_num_rows($result0);
        
        if ($queryResult == 1){
            while ($row=mysqli_fetch_assoc($result0)){
                $flag = $row['flag'];    
            }
            if ($flag == 0){
                $user = array("admin", "adminid");
                return $user;
            }
            if ($flag == 1){
                $user = array("doctor", "slmcid");
                return $user;
            }
            if ($flag == 2){
                $user = array("dispenser", "dispid");
                return $user;
            }
            if ($flag == 3){
                $user = array("pharmacist", "pharmaid");
                return $user;
            }
            if ($flag == 4){
                $user = array("nurse", "nurseid");
                return $user;
            }
            else{
                $user = array("", "");
                return $user;
            }
        }else{
            $user = array("", "");
                return $user;
        }
    }
?>

 