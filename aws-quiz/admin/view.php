<?php
 
require('inc/db.php');
//include("inc/auth.php");

ini_set('display_errors', 1); //show errors

//$username=$_SESSION["username"];
$sql_query="SELECT * FROM question;
$result_set=mysqli_query($con,$sql_query);

if(isset($_GET['delete_id']))
{
 //$delete_query="DELETE FROM profit WHERE Id=".$_GET['delete_id'];
 $deletedtimestamp=date("Y-m-d H:i:s");
 $delete_query="UPDATE profit SET DELETED='1', DeletedTimestamp='".$deletedtimestamp."' WHERE Id=".$_GET['delete_id'];
 mysqli_query($con,$delete_query);
 header("Location: view.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
<script type="text/javascript">
    function delete_id(id){
    if(confirm('Are you sure you want to Delete this record ?'))
    {
     window.location.href='view.php?delete_id='+id;
    }
    }
</script>

</head>
<body>
<?php include("header.php"); ?>
<table class="form">
<h2>View Records</h2>
<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Date</strong></th>
<th><strong>Profit (USDT)</strong></th>
<th><strong>Commission (USDT)</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php
$count=1;
//$username=$_SESSION["username"];
$sel_query="SELECT * FROM profit WHERE username='".$username."' AND Deleted='0' ORDER BY Date";
$result = mysqli_query($con,$sel_query);
while($row = mysqli_fetch_assoc($result)) {
echo "<tr>";
echo "<td align=center>".$row['Date']."</td>";
echo "<td align=center>".$row['Profit']."</td>";
echo "<td align=center>".$row['commission']."</td>";
echo "<td align=center><a href='edit.php?id=".$row['Id']."'>Edit</a></td>";
echo "<td align=center><a href='javascript:delete_id($row[Id])'>Delete</a></td>";
//echo "<td align=center><a onclick='javascript:confirmation($(this));return false;' href='delete.php?id=".$row['Id']."'>Delete</a></td>";
echo "</tr>";
?>
<?php $count++; } ?>
</tbody>
</table>
<?php echo "number of rows: ", $count; 
mysqli_close($con);
?>
<br /><br /><br /><br />
</table>
</body>
</html>