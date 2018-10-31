<?php
$connect = mysqli_connect("localhost", "root", "srilanka", "hmsdb");
$output = '';
if(isset($_POST["timestamp"]))
{
	date_default_timezone_set('Asia/Colombo');
	$t=time();
	$timestamp = date("Y-m-d H:i:s",$t);
	$query = "UPDATE sysmsg SET sysmsg.readtime = '$timestamp' WHERE sysmsg.readtime IS NULL;";
	$result = mysqli_query($connect, $query);
}

?>

<!-- this view messages function is supported by the automatic event function runs on mysql db every day
the following is the query,
create event checkDrugLevels on schedule every 1 day starts '2018-11-01 00:00:01' on completion preserve enable do insert into hmsdb.sysmsg(message) select drug.drugid from hmsdb.drug where drug.drugid in (select drug.drugid from hmsdb.drug where drug.count <='500');
-->
