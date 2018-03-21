<?php
include 'conn.php';
$tn=$_POST['tranNum'];
$tag=$_POST['tag'];
$query="UPDATE transaction set tag_no='$tag' WHERE transaction_number='$tn'";
mysqli_query($connect,$query);
?>