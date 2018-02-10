<?php
include 'conn.php';

$sql="SELECT * FROM transaction WHERE YEAR(time_out)='0000'";
$result=mysqli_query($connect,$sql);
//ID #2
echo "  
        <thead>
            <tr>
                <th>Transaction Number</th>
                <th>Student Number</th>
                <th>Time-in</th>
                <th>Time-out</th>
            </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td><button class=".btnSelect." id=".$row[0]." name=".test.">Time-out</button></td>
          </tr>";
}
echo "</tbody>";
?>