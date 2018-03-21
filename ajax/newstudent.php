<?php
    include 'conn.php';
    $sn=$_POST['sn'];
    $name=$_POST['name'];
    $tb=$_POST['tb'];
    $td=$_POST['td'];
    $ap=$_POST['ap'];
    $sqlQuery="INSERT INTO STUDENT (student_number,name,acad_prog,tuition_discount,tuition_bracket) VALUES ('$sn','$name','$ap','$td','$tb')";
    mysqli_query($connect,$sqlQuery);
?>