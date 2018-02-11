<?php
include 'conn.php';

$tranNum=$_POST['tranNum'];
$sql="UPDATE transaction SET time_out=CURRENT_TIMESTAMP WHERE transaction_number=$tranNum";
mysqli_query($connect,$sql);
$timeinsql="SELECT time_in from transaction WHERE transaction_number=$tranNum";
$timeinresult=mysqli_query($connect,$timeinsql);
$time_in=mysqli_fetch_assoc($timeinresult);
$timeoutsql="SELECT time_out from transaction WHERE transaction_number=$tranNum";
$timeoutresult=mysqli_query($connect,$timeoutsql);
$time_out=mysqli_fetch_assoc($timeoutresult);
$timei=$time_in['time_in'];
$timeo=$time_out['time_out'];
$resultsql="SELECT TIMESTAMPDIFF(SECOND,'$timei','$timeo') as 'result'";
$result=mysqli_query($connect,$resultsql);
$results=mysqli_fetch_assoc($result);
$sqlsql="SELECT student_number FROM transaction where transaction_number=$tranNum";
$resultsn=mysqli_fetch_assoc(mysqli_query($connect,$sqlsql));
$resultsn1=$resultsn['student_number'];
$sqll="SELECT time_remaining FROM student where student_number='$resultsn1'";
$resulttime=mysqli_fetch_assoc(mysqli_query($connect,$sqll));
$timerem=(int)$resulttime['time_remaining'];
$timecon=(int)$results['result'];
$timerem=$timerem-$timecon;
$sql="UPDATE student SET time_remaining=$timerem WHERE student_number='$resultsn1'";
mysqli_query($connect,$sql);
?>