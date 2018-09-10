<?php
    if ($_SESSION['flag'] == 0){
        echo "./user/admin";
    }
    elseif ($_SESSION['flag'] == 1){
        echo "./user/doctor";
    }
    elseif ($_SESSION['flag'] == 2){
        echo "./user/dispenser";
    }
    elseif ($_SESSION['flag'] == 3){
        echo "./user/pharmacist";
    }
    elseif ($_SESSION['flag'] == 4){
        echo "./user/nurse";
    }
    elseif ($_SESSION['flag'] == 5){
        echo "./user/patient";
    }
    else{
        echo "./";
    }
?>