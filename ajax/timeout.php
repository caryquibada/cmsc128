<?php
$connect = mysqli_connect('localhost','root','');

if(!$connect){
    echo 'No connection to server';
}
if(!mysqli_select_db($connect,'upblibusage')){
    echo 'Database "lukedb" is not selected';
}
$tranNum=$_POST['tranNum'];
$sql="UPDATE transaction SET time_out=CURRENT_TIMESTAMP WHERE transaction_number=$tranNum";
mysqli_query($connect,$sql);
?>