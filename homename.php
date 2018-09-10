<?php
    if ($_SESSION['flag'] == 0){
        echo "Administrator";
    }
    elseif ($_SESSION['flag'] == 1){
        echo "Doctor";
    }
    elseif ($_SESSION['flag'] == 2){
        echo "Dispenser";
    }
    elseif ($_SESSION['flag'] == 3){
        echo "Pharmacist";
    }
    elseif ($_SESSION['flag'] == 4){
        echo "Nurse";
    }
    elseif ($_SESSION['flag'] == 5){
        echo "Patient";
    }
    else{
        echo " ";
    }
?>