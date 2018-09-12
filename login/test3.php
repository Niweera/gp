<?php
    function returnName($username) {
        
        $sql = "SELECT * FROM admin WHERE adminid = '$username'";
        $sql1 = "SELECT * FROM doctor WHERE slmcid = '$username'";
        $sql2 = "SELECT * FROM dispenser WHERE dispid = '$username'";
        $sql3 = "SELECT * FROM pharmacist WHERE pharmaid = '$username'";
        $sql4 = "SELECT * FROM nurse WHERE nurseid = '$username'";
        $sql5 = "SELECT * FROM patient WHERE clinicno = '$username'";
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
                $email = $row['email'];
                $contactno = $row['contactno'];
                $user = array($name, $email, $contactno);
                return $user;   
            }
        }
        elseif ($count1 == 1){
            while ($row=mysqli_fetch_assoc($res1)){
                $name = $row['name'];
                $email = $row['email'];
                $contactno = $row['contactno'];
                $user = array($name, $email, $contactno);
                return $user;   
            }
        }
        elseif ($count2 == 1){
            while ($row=mysqli_fetch_assoc($res2)){
                $name = $row['name'];
                $email = $row['email'];
                $contactno = $row['contactno'];
                $user = array($name, $email, $contactno);
                return $user;   
            }
        }
        elseif ($count3 == 1){
            while ($row=mysqli_fetch_assoc($res3)){
                $name = $row['name'];
                $email = $row['email'];
                $contactno = $row['contactno'];
                $user = array($name, $email, $contactno);
                return $user;   
            }
        }
        elseif ($count4 == 1){
            while ($row=mysqli_fetch_assoc($res4)){
                $name = $row['name'];
                $email = $row['email'];
                $contactno = $row['contactno'];
                $user = array($name, $email, $contactno);
                return $user;   
            }
        }
        elseif ($count5 == 1){
            while ($row=mysqli_fetch_assoc($res5)){
                $name = $row['name'];
                $email = $row['email'];
                $contactno = $row['contactno'];
                $user = array($name, $email, $contactno);
                return $user;   
            }
        }
        else{
            return "";
        }
    }
?>

<?php/*
    $id = $_GET['id'];
    $list = returnName($id);
    echo $list[0];
    echo "<br>";
    echo $list[1];
    echo "<br>";
    echo $list[2];
    echo "<br>";*/

?>