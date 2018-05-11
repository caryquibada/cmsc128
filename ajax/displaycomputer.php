<?php
include 'conn.php';
$choicesql="SELECT tag_number from tag where type='computer' AND status='enabled'";
$choiceresult=mysqli_query($connect,$choicesql);
while($row=mysqli_fetch_row($choiceresult)){
    $choices[]=$row[0];
}
$query="SELECT tag_no from transaction WHERE YEAR(time_out)='0000' AND type='Computer_Usage'";
$result=mysqli_query($connect,$query);

$usedcomputer=[];
while($row=mysqli_fetch_row($result)){
    $row[0]=(string)$row[0];
    echo $row[0];
    if((in_array($row[0],$choices))){
        $usedcomputer[]=$row[0];
     }
}
$unusedcomputer=array_diff($choices,$usedcomputer);
$sql="SELECT * FROM transaction WHERE YEAR(time_out)='0000' AND Type='Computer_Usage' ORDER BY time_in DESC";
$result=mysqli_query($connect,$sql);
//ID #2
echo "<thead>
<tr>
    <th>Tag Number</th>
    <th>Name</th>
    <th>Student Number</th>
    <th>Time-in</th>
    <th>Time-out</th>
    
</tr>
</thead>
<tbody id="."'tableBody'".">";

while($row=mysqli_fetch_row($result)){
    $sql="SELECT * from student where student_number='$row[1]'";
    $sqlresult=mysqli_query($connect,$sql);
    $namearray=mysqli_fetch_assoc($sqlresult);
    $name=$namearray['name'];


        
        echo "<tr><div class='change'><td data-search='$row[5]'><select name='".$row[0]."' class='custom-select tag'>";
        echo "<option value='".$row[5]."' selected>$row[5]</option>";
        foreach($unusedcomputer as $choice){
            echo "<option value='".$choice."'>$choice</option>";
            
        }
        echo "</select></td></div><td>$name</td>
        <td>$row[1]</td>
        <td>";
        echo date( "h:i:s a F d, Y", strtotime($row[2]));
        echo "</td>
        
        <td><button class="."'btnSelect btn btn-unique'"." id='".$row[6]." ".$row[0]."' name='<br>Tag: ".$row[5]."<br>Student Number: ".$row[1]."'><input type='hidden' value='".$row[5]."'></input>Time-out</button></td>
      </tr>";
    
}
echo "</tbody>";
?>