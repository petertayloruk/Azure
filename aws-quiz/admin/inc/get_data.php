<?php
header('Content-Type: application/json');

require_once('db.php');
//include('auth.php');
//$username=$_SESSION["username"];

$sqlQuery = "SELECT quiz FROM aws_quiz";
$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
    $rowfiltered = array_filter($row); //filter out any NULL results. i.e if there isn't 5 options, or 2 answers don't show the result.
	$data[] = $rowfiltered;
}

mysqli_close($con);

echo json_encode($data);
?>
