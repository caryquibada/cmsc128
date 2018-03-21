<?php
include 'conn.php';


$studentNumber=$_POST['studentNumber'];
$type=$_POST['type'];
echo $type;
if($type=='Printing'){
    $copies=$_POST['Copies'];
    $amount=floatval($copies)*2.00;
    $insertQuery="INSERT into payment(student_number,type,no_copies,amount_due) values ('$studentNumber','$type','$copies','$amount')";
    
}else if($type=='Scanning'){
    $copies=$_POST['Copies'];
    $amount=floatval($copies)*0.50;
    $insertQuery="INSERT into payment(student_number,type,no_copies,amount_due) values ('$studentNumber','$type','$copies',$amount)";
}else if($type=='Computer_Usage'){
    $tag=$_POST['tag'];
    $insertQuery="INSERT into payment(student_number,type,tag) values ('$studentNumber','$type','$tag')";
}
if(!mysqli_query($connect,$insertQuery)){
    echo "Failure";
}

?>