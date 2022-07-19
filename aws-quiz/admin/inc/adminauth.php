<?php
session_start();
if($_SESSION['Admin']=="0"){
header("Location: index.html");
exit();
}
?>
