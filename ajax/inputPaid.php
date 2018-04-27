<?php
include 'conn.php';


$studentNumber=$_POST['studentNumber'];

if($studentNumber==''){
    $checker=0;
}else{
    $checker=1;
}
$type=$_POST['type'];
if($checker==1){
if($type=='Printing'){
    if(isset($_POST['Copies'])){
        $copies=$_POST['Copies'];
    }else{
        $copies='';
        $checker=0;
    }
    
    $amount=floatval($copies)*2.00;
    $insertQuery="INSERT into payment(student_number,type,no_copies,amount_due) values ('$studentNumber','$type','$copies','$amount')";
    
}else if($type=='Scanning'){
    if(isset($_POST['Copies'])){
        $copies=$_POST['Copies'];
    }else{
        $copies='';
        $checker=0;
    }
    
    $amount=floatval($copies)*0.50;
    $insertQuery="INSERT into payment(student_number,type,no_copies,amount_due) values ('$studentNumber','$type','$copies',$amount)";
}else if($type=='Computer_Usage'){
    $tag=$_POST['tagnumber'];
    $insertQuery="INSERT into payment(student_number,type,tag) values ('$studentNumber','$type','$tag')";
}

echo $checker;
mysqli_query($connect,$insertQuery);
}
?>