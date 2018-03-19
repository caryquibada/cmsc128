<?php
include 'conn.php';

$copies=$_POST['Copies'];
$studentNumber=$_POST['studentNumber'];
$type=$_POST['type'];

if($type=='Printing'){
    $amount=floatval($copies)*2.00;
    $insertQuery="INSERT into payment(student_number,type,no_copies,amount_due) values ('$studentNumber','$type','$copies','$amount')";
    
}else if($type='Scanning'){
    $amount=floatval($copies)*0.50;
    echo $amount;
    $insertQuery="INSERT into payment(student_number,type,no_copies,amount_due) values ('$studentNumber','$type','$copies',$amount)";
}
if(!mysqli_query($connect,$insertQuery)){
    echo "Failure";
}

?>