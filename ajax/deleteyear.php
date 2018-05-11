<?php
include 'conn.php';
$from=$_POST['from'];
$to=$_POST['to'];

$sql="DELETE FROM transaction WHERE time_out BETWEEN '$from' AND '$to'";
echo $to;
mysqli_query($connect,$sql);
?>