<?php
include 'conn.php';

$sql="SELECT * FROM transaction WHERE YEAR(time_out)='0000'";
$result=mysqli_query($connect,$sql);
//ID #2
echo "<thead>
<tr>
    <th>Tag Number</th>
    <th>Transaction Number</th>
    <th>Student Number</th>
    <th>Time-in</th>
    <th>Time-out</th>
    
</tr>
</thead>
<tbody id="."'tableBody'".">";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
            <td>$row[5]</td>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            
            <td><button class="."'btnSelect'"." id=".$row[0]." name="."'test'"." onclick="."'Alert1();load();load1();'".">Time-out</button></td>
          </tr>";
}
echo "</tbody>";
?>