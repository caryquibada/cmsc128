<?php
include 'conn.php';


$visName= $_POST['visName'];
$visOccu= $_POST['visOccu'];
$visOrg= $_POST['visOrg'];
$visAlum= $_POST['visAlum'];
$type=$_POST['type'];
echo $type;

if($type=='Computer_Usage'){
    $tag=$_POST['tag'];
    $insertQuery="INSERT into vistransaction(visName,visOccu,visOrg,visAlum,type,tag) values ('$visName','$visOccu','$visOrg','$visAlum','$type','$tag')";
}




if(!mysqli_query($connect,$insertQuery)){
    echo "Failure";
}

?>