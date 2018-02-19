<?php
include 'conn.php';
$sn=$_POST['student'];
$sql="DELETE FROM STUDENT WHERE student_number='$sn'";
mysqli_query($connect,$sql);
?>