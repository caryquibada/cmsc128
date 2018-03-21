<?php

    include 'conn.php';
    $tn=$_POST['tranNum'];
    mysqli_query($connect,"UPDATE payment SET date_paid=CURRENT_TIMESTAMP where transaction_number='$tn'"); 

?>