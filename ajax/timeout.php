<?php
include 'conn.php';

$tranNum=$_POST['tranNum'];
$sql="UPDATE transaction SET time_out=CURRENT_TIMESTAMP WHERE transaction_number=$tranNum";
mysqli_query($connect,$sql);
$timeinsql="SELECT time_in from transaction WHERE transaction_number=$tranNum";
$timeinresult=mysqli_query($connect,$timeinsql);
$time_in=mysqli_fetch_assoc($timeinresult);
$timeoutsql="SELECT time_out from transaction where transaction_number=$tranNum";
$timeoutresult=mysqli_query($connect,$timeoutsql);
$time_out=mysqli_fetch_assoc($timeoutresult);
$resultsql="SELECT TIMESTAMPDIFF(SECOND,'$time_in[0]','$time_out[0]')";
$result=mysqli_query($connect,$resultsql);
$results=mysqli_fetch_assoc($result);
$sqlsql="SELECT student_number FROM transaction where transaction_number=$tranNum";
$resultsn=mysqli_fetch_assoc(mysqli_query($connect,$sqlsql));
$sqll="SELECT time_remaining FROM student where student_number='$resultsn[0]'";
$resulttime=mysqli_fetch_assoc(mysqli_query($connect,$sqll));
$timerem=(int)$resulttime[0];
$timecon=(int)$results[0];
$timerem=$timerem-$timecon;
$sql="UPDATE student SET time_remaining=$timerem WHERE student_number='$resultsn[0]'";
mysqli_query($connect,$sql);
?>