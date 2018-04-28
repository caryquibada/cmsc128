<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=date("Y-m-d", strtotime($_POST['from']));
    $totime=date("Y-m-d", strtotime($_POST['to']));
    $by=$_POST['by'];
    //Sql query
    if($by=="all"){
        $sql="SELECT year(time_out),month(time_out) as Month, count(*) as Count from transaction where (time_out between '$fromtime' and '$totime') group by year(time_out), month(time_out)";
    }else{
        $sql="SELECT year(time_out),month(time_out) as Month, count(*) as Count from transaction where type='$by' AND (time_out between '$fromtime' and '$totime') group by year(time_out), month(time_out)";
    }
    
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
      <td>".$monthName = date('F', mktime(0, 0, 0, $row[1], 10))."</td>     
      <td>$row[2]</td>    
      </tr>";
    }
    echo "</tbody>";
    
?>