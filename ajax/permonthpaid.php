<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=date("Y-m-d", strtotime($_POST['from']));
    $totime=date("Y-m-d", strtotime($_POST['to']));
    $by=$_POST['by'];
    //Sql query
    if($by=="all"){
        $sql="SELECT year(date_paid),month(date_paid) as Month, sum(amount_due) as Count from payment where (date_paid between '$fromtime' and '$totime') group by year(date_paid), month(date_paid)";
    }else{
        $sql="SELECT year(date_paid),month(date_paid) as Month, sum(amount_due) as Count from payment where type='$by' AND (date_paid between '$fromtime' and '$totime') group by year(date_paid), month(date_paid)";
    }
    
    $result=mysqli_query($connect,$sql);
    echo "  
    <thead>
    <tr>
    <th>Year</th>       
    <th>Month</th>
    <th>Earnings</th>
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