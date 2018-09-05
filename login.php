<?php
	include './dbconf/dbh.php';
	session_start();
	
	
	if(isset($_POST['submit']))
	{
		if((isset($_POST['email']) && $_POST['email'] !='') && (isset($_POST['password']) && $_POST['password'] !=''))
		{
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);
			
			$sqlEmail = "select * from customer where email = '".$email."'";
			$rs = mysqli_query($conn,$sqlEmail);
			$numRows = mysqli_num_rows($rs);
			
			if($numRows  == 1)
			{
				$row = mysqli_fetch_assoc($rs);
				
				if(password_verify($password,$row['Password']))
				{
					session_start();
					$_SESSION['cuid'] = $row['CuID'];
					$_SESSION['user_id'] = $row['CustID'];
					$_SESSION['first_name'] = $row['FirstName'];
					$_SESSION['last_name'] = $row['LastName'];
					$_SESSION['email'] = $row['Email'];
					$_SESSION['ContactNo'] = $row['ContactNo'];
					header('location: ../user');
					exit;
					
				}
				else
				{
					echo "<script>alert(\"Wrong Email Or Password!\");</script>";
				}
			}
			else
			{
				echo "<script>alert(\"No User Found!\");</script>"; 
			}
		}
	}
?>