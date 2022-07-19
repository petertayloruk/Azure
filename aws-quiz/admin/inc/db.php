<?php

$con = mysqli_connect("examtest.cmuslrz5iv3y.eu-west-2.rds.amazonaws.com","admin","Blackforrestaeroplane","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>
