<?php
include 'conn.php';
$arrIDS=$_POST['IDS'];
foreach($arrIDS as $ID){
    $sql="DELETE FROM STUDENT WHERE student_number='$ID'";
    mysqli_query($connect,$sql);
}
?>