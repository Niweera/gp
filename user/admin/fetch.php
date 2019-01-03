<?php
$connect = mysqli_connect("localhost", "root", "srilanka", "hmsdb");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT drug.drugname, drug.count, dispenser.name,drugupdate.timestamp FROM drug LEFT JOIN drugupdate ON drug.drugid = drugupdate.drugid LEFT JOIN dispenser ON drugupdate.dispid = dispenser.dispid WHERE drugname LIKE '%".$search."%' ORDER BY drug.count ASC;
	";
}    
else
{
	$query = "
	SELECT drug.drugname, drug.count, dispenser.name,drugupdate.timestamp 
	FROM drug 
		LEFT JOIN drugupdate 
			ON drug.drugid = drugupdate.drugid
		LEFT JOIN dispenser
			ON drugupdate.dispid = dispenser.dispid
			ORDER BY drug.count ASC
	;";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Drug Name</th>
							<th>Drug Count</th>
							<th>Last Updated</th>
							<th>Updated By</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$drugcount = $row['count'];
		if ($drugcount < 500){
			$dangerColor = "#FF0000";
		}else{
			$dangerColor = "black";
		} 
		$output .= "
			<tr>
				<td style = \"color:".$dangerColor."\">".$row["drugname"]."</td>
				<td>".$drugcount."</td>
				<td>".$row["timestamp"]."</td>
				<td>".$row["name"]."</td>
			</tr>
		";
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>