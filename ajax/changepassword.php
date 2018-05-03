<?php

include 'conn.php';

if(isset($_POST['password'])&&!empty($_POST['password'])){
    $password=$_POST['password'];

    $sql="UPDATE settings set password='$password'";
    mysqli_query($connect,$sql);
}else{
    echo 'fail';
}

?>