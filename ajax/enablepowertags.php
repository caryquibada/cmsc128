<?php
include 'conn.php';
$powersql="SELECT * FROM tag where type='power'";
$powerresult=mysqli_query($connect,$powersql);
$ctr=1;

while($row=mysqli_fetch_row($powerresult)){
    if($row[1]=="enabled"){
        echo "<div class='form-check form-check-inline'><input type='checkbox' checked value='$row[0]' class='power'><label class='form-check-label' for='inlineRadio2' >$row[0]</label></div>";
    }else{
        echo "<div class='form-check form-check-inline'><input type='checkbox' value='$row[0]' class='power'><label class='form-check-label' for='inlineRadio2' >$row[0]</label></div>";
    }
    if($ctr%10==0){
        echo "<br>";
    }
    $ctr++;
}
?>