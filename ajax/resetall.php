<?php
    include 'conn.php';
    $sql="UPDATE student set time_remaining=72000";
    mysqli_query($connect,$sql);
?>