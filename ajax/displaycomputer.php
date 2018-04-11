<?php
include 'conn.php';
$choices= array("0","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31","32","33","34","35","36","37","38","39","40");
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


        $i=1;
        echo "<tr><div class='change'><td><select name='".$row[0]."' class='custom-select'>";
        while($i<=40){
            if($row[5]==(string)$i){
                echo "<option value='".$row[5]."' selected>$row[5]</option>";
            }else{
                echo "<option value='".$i."'>$i</option>";
            }
            $i=$i+1;
        }
        echo "</select></td></div><td>$name</td>
        <td>$row[1]</td>
        <td>";
        echo date( "h:i:s A F d, Y", strtotime($row[2]));
        echo "</td>
        
        <td><button class="."'btnSelect btn btn-unique'"." id='".$row[6]." ".$row[0]."' name='".$row[1]."'>Time-out</button></td>
      </tr>";
    
}
echo "</tbody>";
?>