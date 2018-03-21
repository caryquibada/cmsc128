<?php

include 'conn.php';
$or=$_POST['orNumber'];
$tn=$_POST['tranNum'];
$sql="UPDATE payment set status='PAID' where transaction_number=$tn";
mysqli_query($connect,$sql);
$sql="UPDATE payment set or_number='$or' where transaction_number=$tn";
mysqli_query($connect,$sql);

?>