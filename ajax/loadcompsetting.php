<?php

include 'conn.php';

$sqlquery="SELECT charge_computer from settings";
$result=mysqli_query($connect,$sqlquery);
$row=mysqli_fetch_array($result);

echo "<input type='hidden' value='".$row[0]."' id='computer'></input>";

?>