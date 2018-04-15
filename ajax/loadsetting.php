<?php

include 'conn.php';

$sqlquery="SELECT confirm_timeout from settings";
$result=mysqli_query($connect,$sqlquery);
$row=mysqli_fetch_array($result);

echo "<input type='hidden' value='".$row[0]."' id='confirm'></input>";

?>