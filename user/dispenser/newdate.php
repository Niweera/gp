<?php
$connect = mysqli_connect("localhost", "root", "srilanka", "hmsdb");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "SELECT drug.drugname,sysmsg.createtime FROM sysmsg INNER JOIN drug ON drug.drugid = sysmsg.message WHERE sysmsg.createtime LIKE '%".$search."%' AND sysmsg.readtime IS NULL ORDER BY sysmsg.createtime DESC;";
}    
else
{
	$query = "
	SELECT drug.drugname,sysmsg.createtime FROM sysmsg INNER JOIN drug ON drug.drugid = sysmsg.message WHERE readtime IS NULL ORDER BY sysmsg.createtime DESC;";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Message</th>
							<th>Received Time</th>
							<th></th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>Drug count threshold reached for the drug: '.$row["drugname"].'</td>
				<td>'.$row["createtime"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo '<p class="text-danger">*No new system messages!</p>';
}
?>

