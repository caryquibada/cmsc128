<?php

include 'conn.php';

$sql="SELECT password from settings";
$result=mysqli_query($connect,$sql);
$row=mysqli_fetch_row($result);
echo "<input type='hidden' id='loaded'value='$row[0]'></input>";
?>