<?php
include 'conn.php';


$visName= $_POST['visName'];

$visOccu= $_POST['visOccu'];
$visOrg= $_POST['visOrg'];
$visAlum= $_POST['visAlum'];
$type=$_POST['type'];
$tag=$_POST['tagnumber'];
echo $type;
echo $tag;

 
    $insertQuery = "INSERT into vistransaction(visName, visOccu,visOrg,visAlum,type,tag_no) values ('$visName','$visOccu','$visOrg','$visAlum','$type','$tag')";

echo $insertQuery;

if(!mysqli_query($connect,$insertQuery)){
    echo "Failure";
}

?>