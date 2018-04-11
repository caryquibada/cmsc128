<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=$_POST['from'];
    $totime=$_POST['to'];
    //Sql query
    $sql="SELECT year(time_out),month(time_out),week(time_out) as Week, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by year(time_out), month(time_out),week(time_out)";
    $result=mysqli_query($connect,$sql);
        echo "  
        <thead>
        <tr>
        <th>Year</th>       
        <th>Month</th>
        <th>Week</th>
        <th>Count</th>
        </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
          <td>$row[0]</td>
          <td>".$monthName = date('F', mktime(0, 0, 0, $row[1], 10))."</td>     
          <td>$row[2]</td>    
          <td>$row[3]</td>  
          </tr>";
}
echo "</tbody>";
?>