<?php
include 'conn.php';
$from=$_POST['from'];
$to=$_POST['to'];
$table=$_POST['table'];
if($table=="all"){
    $sql="DELETE FROM transaction WHERE time_out BETWEEN '$from' AND '$to'";
    mysqli_query($connect,$sql);
    $sql="DELETE FROM payment WHERE date_paid BETWEEN '$from' AND '$to'";
    mysqli_query($connect,$sql);
    $sql="DELETE FROM vistransaction WHERE time_out BETWEEN '$from' AND '$to'";
    mysqli_query($connect,$sql);
}else if($table=="payment"){
    $sql="DELETE FROM payment WHERE date_paid BETWEEN '$from' AND '$to'";
    mysqli_query($connect,$sql);
}else if($table=="vistransaction"){
    $sql="DELETE FROM vistransaction WHERE time_out BETWEEN '$from' AND '$to'";
    mysqli_query($connect,$sql);
}else{
    $sql="DELETE FROM transaction WHERE time_out BETWEEN '$from' AND '$to'";
    mysqli_query($connect,$sql);
}
echo $table;


?>