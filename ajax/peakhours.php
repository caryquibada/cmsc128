<?php
include 'conn.php';

$fromtime=date("Y-m-d", strtotime($_POST['from']));
$totime=date("Y-m-d", strtotime($_POST['to']));
$by=$_POST['by'];
//Sql query
if($by==""){
    $sql="SELECT month(time_out) as Month, day(time_out) as Day, hour(time_out) as Hour, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by month(time_out),day(time_out), hour(time_out)";
}else{
    $sql="SELECT month(time_out) as Month, day(time_out) as Day, hour(time_out) as Hour, count(*) as Count from transaction where (time_out between '$fromtime' and '$totime') AND type='$by' group by month(time_out),day(time_out), hour(time_out)";
}

$days= array(array(),array());
$i=0;
$result=mysqli_query($connect,$sql);
while($row=mysqli_fetch_row($result)){
    if(!(in_array($row[1],$days[1]))){
        $days[0][$i]=$row[0];
        $days[1][$i]=$row[1];
        //echo $days[0][$i]."-".$days[1][$i]."<br>";
        $i++;
    }
}
$j=0;
$ctr=0;
$max=array(array(),array());
foreach($days[1] as $day){
    $i=0;
    $result=mysqli_query($connect,$sql);
    $hours= array(array(),array());
    
    while($row=mysqli_fetch_row($result)){
        if($days[0][$j]==$row[0]&&$row[1]==$day){
            $hours[0][$i]=$row[2];
            $hours[1][$i]=$row[3];
            //echo $hours[0][$i];
            $i++;
        }
    }
    $max[3][$ctr]=max($hours[1]);
    $dayctr=0;
    while($dayctr<sizeof($hours[1])){
        if($hours[1][$dayctr]==$max[3][$ctr]){
            $max[2][$ctr]=$hours[0][$dayctr];
            break;
        }
        $dayctr++;
    }
    $monthctr=0;
    while($monthctr<sizeof($max[2])){
        $max[1][$ctr]=$days[1][$monthctr];
        $max[0][$ctr]=$days[0][$monthctr];
        $monthctr++;
    }
    //echo $max[0][$ctr]."-".$max[1][$ctr]."-".$max[2][$ctr]."<br>";
    $ctr++;
    $j++;
}
echo "<thead>
        <th>Month</th>
        <th>Day</th>
        <th>Hour</th>
        <th>Count</th
    </thead>
    <tbody>";
    $index=0;
    
while($index<sizeof($max[0])){
    echo "<tr><td>".$monthName = date('F', mktime(0, 0, 0, $max[0][$index], 10))."</td>
            <td>".$max[1][$index]."</td>
            <td>".$max[2][$index]."</td>
            <td>".$max[3][$index]."</td>
            </tr>";
            $index++;
}
echo "</tbody>";
?>