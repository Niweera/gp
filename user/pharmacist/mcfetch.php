<?php
$connect = mysqli_connect("localhost", "root", "srilanka", "hmsdb");
$output = '';
if(isset($_POST["query"]))
{
	$query = "SELECT count(1) AS count FROM pharmdisp WHERE readtime IS NULL;";

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{

	while($row = mysqli_fetch_array($result))
	{
		$output = $row["count"];
		if ($output > 0){
			$output = 1;
		}
	}
	if ($output !=0){
		$output = "new";
		echo $output;
	}
}
}
//mcfetch.php is used to check whether new reports are arrived
?>