<?php

include 'conn.php';
$sql="";
$checked=$_POST['checked'];
foreach($checked as $check){
    $sql="UPDATE tag SET status='enabled' where tag_number=$check AND type='computer'";
    mysqli_query($connect,$sql);
}
$unchecked=$_POST['unchecked'];
$sql="";
foreach($unchecked as $uncheck){
    $sql="UPDATE tag SET status='disabled' where tag_number=$uncheck AND type='computer'";
    mysqli_query($connect,$sql);
}

?>