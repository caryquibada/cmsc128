<?php
    include 'conn.php';
    $stuNum=$_POST['student'];
    $sql="UPDATE student SET time_remaining=72000 where student_number='$stuNum'";
    mysqli_query($connect,$sql);
?>