<?php

include 'conn.php';

$computersql="SELECT * FROM tag where type='computer'";
$computerresult=mysqli_query($connect,$computersql);

$ctr=1;
while($row=mysqli_fetch_row($computerresult)){
    if($row[1]=="enabled"){
        echo "<div class='form-check form-check-inline'><input class='pc' type='checkbox' checked value='$row[0]'><label class='form-check-label' for='inlineRadio2' >$row[0]</label></div>";
    }else{
        echo "<div class='form-check form-check-inline'><input class='pc' type='checkbox' value='$row[0]'><label class='form-check-label' for='inlineRadio2' >$row[0]</label></div>";
    }
    if($ctr%10==0){
        echo "<br>";
    }
    $ctr++;
}
?>