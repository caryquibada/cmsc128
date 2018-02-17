<?php
include 'conn.php';

$sql="SELECT * FROM transaction WHERE YEAR(time_in)=YEAR(CURRENT_TIMESTAMP) AND MONTH(time_in)=MONTH(CURRENT_TIMESTAMP) AND DAY(time_in)=DAY(CURRENT_TIMESTAMP) AND YEAR(time_out)='0000'";
$result=mysqli_query($connect,$sql);
//ID #2
echo "<thead>
<tr>
    <th>Type</th>
    <th>Tag Number</th>
    <th>Student Number</th>
    <th>Time-in</th>
    <th>Time-out</th>
    
</tr>
</thead>
<tbody id="."'tableBody'".">";

while($row=mysqli_fetch_row($result)){
    echo "<tr class='"."table-light"."'>
            <td>$row[6]</td>
            <td>$row[5]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            
            <td><button class="."'btnSelect'"." id='".$row[6]." ".$row[0]."' name="."'test'"." onclick="."'Alert1();load();'".">Time-out</button></td>
          </tr>";
    
}
echo "</tbody>";
?>