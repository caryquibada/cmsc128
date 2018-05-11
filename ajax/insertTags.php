<?php

include 'conn.php';

$i=1;

while($i<151){
    $sql="INSERT INTO tag(tag_number,type) VALUES ('$i','power')";
    mysqli_query($connect,$sql);
    $i++;
}

?>