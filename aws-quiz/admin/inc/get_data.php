<?php
header('Content-Type: application/json');

require_once('db.php');
//include('auth.php');
//$username=$_SESSION["username"];

$sqlQuery = "SELECT questions.id, questions.question, questions.right_option options.option AND questions.deleted='0' ORDER BY questions.id";

$result = mysqli_query($con,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($con);

echo json_encode($data);
?>
