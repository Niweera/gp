<?php
        /*include '../../dbconf/dbh.php';
    

        $x = 6;
        while($x <= 30) {
            $password = "123";
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            $flag = "5";
            $str = 'abcdeghijklmnoprstuw';
            $letter = $str[rand(0, strlen($str)-1)];
            //$letter = chr(rand(97, 122));
            $year = rand(19, 99);
            $str_length = 4;
            $num = $x;
            $no = substr("0000{$num}", -$str_length);
            $clinicno = $letter.$year.$no;
            $name = "Test Patient".$x;
            $contactno = "076".rand(1111111,9999999);
            $email = "w.nipuna@gmail.com";
            $gender = rand(0,1);
            $dc = "1";
            $mc = "0";
            $address = "sdfdsgfdagfad";
            $nurseid = "nurse";
            $y = rand(1920,1999);
            
            $dob = strval($y)."-03-11";

            $sql = "INSERT INTO user (userid,password,flag) VALUES ('$clinicno','$hashed_password','$flag');";
            $mysqli_query = mysqli_query($conn, $sql);
            
            $sql1 = "INSERT INTO patient (name,contactno,clinicno,email,gender,dob,address,nurseid,dc,mc) VALUES ('$name','$contactno','$clinicno','$email','$gender','$dob','$address','$nurseid','$dc','$mc');";
            $mysqli_query1 = mysqli_query($conn, $sql1);

            $x++;
        }     */


