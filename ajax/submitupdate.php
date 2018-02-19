<?php
include 'conn.php';
$name=$_POST['name'];
$tb=$_POST['tb'];
$td=$_POST['td'];
$ap=$_POST['ap'];
$sn=$_POST['sn'];
$sql="UPDATE student set name='$name',acad_prog='$ap',tuition_bracket='$tb',tuition_discount='$td' WHERE student_number='$sn' ";
mysqli_query($connect,$sql);
?>