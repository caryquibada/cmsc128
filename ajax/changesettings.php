<?php
include 'conn.php';
$computer=$_POST['computer'];
$confirm=$_POST['confirm'];

$computer=(int)$computer;
$confirm=(int)$confirm;
echo $confirm;
$computerquery="UPDATE settings SET charge_computer=$computer";
$confirmquery="UPDATE settings SET confirm_timeout=$confirm";
mysqli_query($connect,$computerquery);
mysqli_query($connect,$confirmquery);
?>