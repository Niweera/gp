
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

<p>you are nurse</p>
<?php echo $_SESSION['userid'];?><br>
<?php echo $_SESSION['flag'];?><br>
<?php echo $_SESSION['name'];?><br>
<?php echo $_SESSION['contactno'];?><br>
<?php echo $_SESSION['email'];?>