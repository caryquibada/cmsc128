<?php 
include 'conn.php';
    echo '<select class="custom-select form-control-lg alltags" name="tagnumber" form="chargingform" id="chargingselect">';
    $sql="SELECT tag_number from tag where type='computer' AND status='enabled'";
    $sqlresult=mysqli_query($connect,$sql);
    while( $row = mysqli_fetch_row( $sqlresult)){
        $tagarray[] = $row[0]; 
    }
    $query="SELECT tag_no from transaction WHERE YEAR(time_out)='0000' AND type='Computer_Usage'";
    $result=mysqli_query($connect,$query);
    
    $usedcomputer=[];
    while($row=mysqli_fetch_row($result)){
        $row[0]=(string)$row[0];
        echo $row[0];
        if((in_array($row[0],$tagarray))){
            $usedcomputer[]=$row[0];
         }
    }
    $unusedcomputer=array_diff($tagarray,$usedcomputer);
    foreach($unusedcomputer as $tagcomputer){
        echo "<option value='$tagcomputer'>$tagcomputer</option>";
    }
    echo "</select>"
?>            