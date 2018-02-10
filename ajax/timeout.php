<?php
include 'conn.php';

$tranNum=$_POST['tranNum'];
$sql="UPDATE transaction SET time_out=CURRENT_TIMESTAMP WHERE transaction_number=$tranNum";
mysqli_query($connect,$sql);
?>