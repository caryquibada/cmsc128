<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=date("Y-m-d", strtotime($_POST['from']));
    $totime=date("Y-m-d", strtotime($_POST['to']));
    //Sql query
    $sql="SELECT month(time_out) as Month, day(time_out) as Day, hour(time_out) as Hour, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by month(time_out),day(time_out), hour(time_out)";
    //obtaining result
    $result=mysqli_query($connect,$sql);
    echo "  
        <thead>
            <tr>
                <th>Month</th>
                <th>Day</th>
                <th>Hour</th>
                <th>Count</th>
            </tr>
        </thead>
    <tbody>";

    while($row=mysqli_fetch_row($result)){
    echo "<tr>
            <td>".$monthName = date('F', mktime(0, 0, 0, $row[0], 10))."</td>
            <td>$row[1]</td>     
            <td>$row[2]</td>   
            <td>$row[3]</td> 
    </tr>";
}
echo "</tbody>";
?>