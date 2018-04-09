<?php
include 'conn.php';
$sql="DELETE FROM transaction WHERE time_out BETWEEN NOW()-INTERVAL 1 YEAR AND NOW()";
mysqli_query($connect,$sql);
?>