<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=$_POST['from'];
    $totime=$_POST['to'];
    //Sql query
        $sql="SELECT month(time_out) as Month, day(time_out) as Day, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by month(time_out),day(time_out)";
                $result=mysqli_query($connect,$sql);
                echo "  
                <thead>
                <tr>
                <th>Month</th>
                <th>Day</th>
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