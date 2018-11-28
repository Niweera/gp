<?php
$connect = mysqli_connect("localhost", "root", "srilanka", "hmsdb");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT drug.drugname,sysmsg.createtime,sysmsg.readtime FROM sysmsg INNER JOIN drug ON drug.drugid = sysmsg.message WHERE sysmsg.createtime LIKE '%".$search."% ORDER BY sysmsg.createtime DESC';
	";
}    
else
{
	$query = "
	SELECT drug.drugname,sysmsg.createtime,sysmsg.readtime FROM sysmsg INNER JOIN drug ON drug.drugid = sysmsg.message WHERE readtime IS NOT NULL ORDER BY sysmsg.createtime DESC;";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Message</th>
							<th>Received Time</th>
							<th>Read Time</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>Drug count threshold reached for the drug: '.$row["drugname"].'</td>
				<td>'.$row["createtime"].'</td>
				<td>'.$row["readtime"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo '<p class="text-danger">*No viewed system messages!</p>';
}
?>

<!-- this view messages function is supported by the automatic event function runs on mysql db every day
the following is the query,
create event checkDrugLevels on schedule every 1 day starts '2018-11-01 00:00:01' on completion preserve enable do insert into hmsdb.sysmsg(message) select drug.drugid from hmsdb.drug where drug.drugid in (select drug.drugid from hmsdb.drug where drug.count <='500');
-->





