<?php

    include 'conn.php';
    $tn=$_POST['tranNum'];
    mysqli_query($connect,"UPDATE vistransaction SET time_out=CURRENT_TIMESTAMP where transaction_number='$tn'"); 

?>