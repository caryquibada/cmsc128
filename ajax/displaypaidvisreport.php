<?php

include 'conn.php';
$fromtime=date("Y-m-d", strtotime($_POST['from']));
$totime=date("Y-m-d", strtotime($_POST['to']));
$by=$_POST['by'];

echo $by;

if($by=="all"){
    $sql="SELECT * FROM vistransaction where time_in between '$fromtime' AND '$totime'";
}else{
    $sql="SELECT * FROM vistransaction where (time_in between '$fromtime' AND '$totime') AND type='$by'";
}

$result=mysqli_query($connect,$sql);
echo $sql;
echo "<thead>
<tr>
    <th>Tag Number</th> 
    <th>Type</th>
    <th>Name</th>
    <th>Occupation</th>
    <th>Organization</th>
    <th>Alumni?</th>
    <th>Time-in</th>
    <th>Time-out</th>
    <th>Amount Due</th>
    <th>O.R Number</th>
    
</tr>
</thead>
<tbody id="."'tableBody'".">";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
        <td>$row[1]</td>
        <td>$row[5]</td>
        <td>$row[6]</td>
        <td>$row[7]</td>
        <td>$row[8]</td>
        <td>$row[9]</td>
        <td>$row[3]</td>
        <td>$row[12]</td>
        <td>$row[1]</td>
        <td></td>
        </tr>";
}
echo "</tbody>"


?>