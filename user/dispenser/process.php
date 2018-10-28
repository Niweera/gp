<?php
require_once 'userFunctions.php';
if(isset($_POST["drugid"])) {
    $value = trim($_POST["drugid"]);
    $Records = new Records();
    echo $Records->searchDate($value);
}