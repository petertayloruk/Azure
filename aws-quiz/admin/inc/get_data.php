<?php
header('Content-Type: application/json');

require_once('db.php');
//include('auth.php');
//$username=$_SESSION["username"];

$sqlQuery = "SELECT question, o1, o2, o3, o4, o5, o6, answer1, answer2, answer3, answer4 FROM aws_quiz";
$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
    //$row = json_decode($row);
    $rowfiltered = array_filter($row);
	$data[] = $rowfiltered;
}

mysqli_close($con);

echo json_encode($data);
?>
