<?php 
include 'conn.php';
    echo '<select class="form-control-lg" name="tagnumber" form="chargingform" id="chargingselect">';
    $computer= array("1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40","41");
    $query="SELECT tag_no from transaction WHERE YEAR(time_out)='0000' AND type='Computer_Usage'";
    $result=mysqli_query($connect,$query);
    $usedcomputer=[];
    while($row=mysqli_fetch_row($result)){
        $row[0]=(string)$row[0];
        echo $row[0];
        if((in_array($row[0],$computer))){
            $usedcomputer[]=$row[0];
         }
    }
    $unusedcomputer=array_diff($computer,$usedcomputer);
    foreach($unusedcomputer as $tagcomputer){
        echo "<option value='$tagcomputer'>$tagcomputer</option>";
    }
    echo "</select>"
?>            