<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=$_POST['from'];
    $totime=$_POST['to'];
    //Sql query
    $sql="SELECT year(time_out),month(time_out) as Month, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by year(time_out), month(time_out)";
    $result=mysqli_query($connect,$sql);
    echo "  
    <thead>
    <tr>
    <th>Year</th>       
    <th>Month</th>
    <th>Count</th>
    </tr>
    </thead>
    <tbody>";

while($row=mysqli_fetch_row($result)){
echo "<tr>
      <td>$row[0]</td>
      <td>$row[1]</td>     
      <td>$row[2]</td>    
      </tr>";
}
echo "</tbody>";
?>