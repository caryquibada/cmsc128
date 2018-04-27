<?php
    include 'conn.php';
    $sn=$_POST['sn'];
    $name=$_POST['name'];
    $tb=$_POST['tb'];
    $td=$_POST['td'];
    $ap=$_POST['ap'];
    $snQuery="SELECT student_number from student";
    $array=mysqli_fetch_array(mysqli_query($connect,$snQuery));
    if(in_array($sn,$array)){
        echo '0';
    }else{
        $sqlQuery="INSERT INTO STUDENT (student_number,name,acad_prog,tuition_discount,tuition_bracket) VALUES ('$sn','$name','$ap','$td','$tb')";
    }
    
    if(!mysqli_query($connect,$sqlQuery)){
        echo '0';
    }   
?>