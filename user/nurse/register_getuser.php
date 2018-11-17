<?php
$connect = mysqli_connect("localhost", "root", "srilanka", "hmsdb");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT * FROM patient ORDER BY timestamp DESC;";

	$result = mysqli_query($connect, $query);
	if(mysqli_num_rows($result) > 0)
	{
		$output .= '<div class="table-responsive">
						<table class="table table bordered">
							<tr>
								<th>Patient ID</th>
								<th>Name</th>
								<th>Gender</th>
								<th>DoB</th>
								<th>Age</th>
								<th>Clinic</th>
								<th>Contact No.</th>
							</tr>';
		while($row = mysqli_fetch_array($result))
		{
			$name =  $row['name'];
			$gender =  $row['gender'];
			$dc =  $row['dc'];
			$mc =  $row['mc'];
			if ($gender == 0){
				$sex = "Female";
			}elseif ($gender == 1){
				$sex = "Male";
			}
			$udob =  $row['dob'];
			$dob = new DateTime($udob);
			$now = new DateTime();
			$difference = $now->diff($dob);
			$age = $difference->y;
			if ($dc ==1 && $mc ==1){
				$clinic = "MC & DC";
			}elseif ($mc == 1){
				$clinic = "MC";
			}elseif ($dc ==1){
				$clinic = "DC";
			}else{
				$clinic = "N/A";
			}
			$output .= '
				<tr>
					<td>'.$row["clinicno"].'</td>
					<td>'.$row["name"].'</td>
					<td>'.$sex.'</td>
					<td>'.$row["dob"].'</td>
					<td>'.$age.'</td>
					<td>'.$clinic.'</td>
					<td>0'.$row["contactno"].'</td>
				</tr>
			';
		}
		echo $output;
	}
	else
	{
		echo 'Data Not Found';
	}
}else{
	echo "Restricted";
}
?>