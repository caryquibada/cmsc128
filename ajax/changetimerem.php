<?php

include 'conn.php';

$time=$_POST['timerem'];
$stuNum=$_POST['student'];
list($hours, $minutes) = explode(':', $time, 2);
$seconds = $minutes * 60 + $hours * 3600;
$sql="UPDATE student SET time_remaining=$seconds where student_number='$stuNum'";
mysqli_query($connect,$sql);
?>