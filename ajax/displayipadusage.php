<?php
include 'conn.php';

$sql="SELECT * FROM transaction WHERE YEAR(time_in)=YEAR(CURRENT_TIMESTAMP) AND MONTH(time_in)=MONTH(CURRENT_TIMESTAMP) AND DAY(time_in)=DAY(CURRENT_TIMESTAMP) AND YEAR(time_out)='0000' AND Type='iPad_Usage' ORDER BY time_in DESC";
$result=mysqli_query($connect,$sql);
//ID #2
echo "<thead>
<tr>
    <th>Type</th>
    <th>Tag Number</th>
    <th>Name</th>
    <th>Student Number</th>
    <th>Time Remaining</th>
    <th>Time-in</th>
    <th>Time-out</th>
    
</tr>
</thead>
<tbody id="."'tableBody'".">";

while($row=mysqli_fetch_row($result)){
    $sql="SELECT * from student where student_number='$row[1]'";
    $sqlresult=mysqli_query($connect,$sql);
    $namearray=mysqli_fetch_assoc($sqlresult);
    $name=$namearray['name'];
    $timerem=$namearray['time_remaining'];
    $timerem=$timerem/3600;
    if(!function_exists('ceiling')){
        function ceiling($number, $significance = 1){
        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
        }
    }
    $timerem=ceiling($timerem,0.005);   //ID 7
    if($timerem>1){
    echo "<tr>
            <td>$row[6]</td>
            <td>$row[5]</td>
            <td>$name</td>
            <td>$row[1]</td>
            <td>";

            echo "$timerem hours</td>
            <td>$row[2]</td>
            
            <td><button class="."'btnSelect btn btn-unique'"." id='".$row[6]." ".$row[0]."' name="."'test'"." onclick="."'Alert1();load();'".">Time-out</button></td>
          </tr>";
    }else{
        echo "<tr class='"."table-danger"."'>
        <td>$row[6]</td>
        <td>$row[5]</td>
        <td>$name</td>
        <td>$row[1]</td>
        <td>";

        echo "$timerem hours</td>
        <td>$row[2]</td>
        
        <td><button class="."'btnSelect btn btn-unique'"." id='".$row[6]." ".$row[0]."' name="."'test'"." onclick="."'Alert1();load();'".">Time-out</button></td>
      </tr>";

    }
    
}
echo "</tbody>";
?>