<?php
include 'conn.php';

$sql="SELECT * FROM transaction WHERE YEAR(time_out)!='0000' AND DAY(time_out)=DAY(CURRENT_TIMESTAMP) AND YEAR(time_out)=YEAR(CURRENT_TIMESTAMP) AND MONTH(time_out)=MONTH(CURRENT_TIMESTAMP) ORDER BY time_out DESC";
$result=mysqli_query($connect,$sql);
//ID #2
echo "  
        <thead>
        <tr>
        <th>Transaction Number</th>
        <th>Student Number</th>
        <th>Time-in</th>
        <th>Time-out</th>
        <th>Time Consumed</th>
        </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
          <td>$row[0]</td>
          <td>$row[1]</td>
          <td>$row[2]</td>
          <td>$row[3]</td>     
          <td>$row[4]</td>   
          </tr>";
}
echo "</tbody>";
?>