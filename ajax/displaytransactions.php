<?php

include 'conn.php';
$fromtime=date("Y-m-d", strtotime($_POST['from']));
$totime=date("Y-m-d", strtotime($_POST['to']));
$by=$_POST['by'];

if($by=='all'){
    $sql="SELECT * FROM TRANSACTION WHERE time_out between '$fromtime' and '$totime'";
}else{
    $sql="SELECT * FROM TRANSACTION WHERE (time_out between '$fromtime' and '$totime') AND type='$by'";
}

$result=mysqli_query($connect,$sql);
echo "<thead>
<tr>
    <th>Student Number</th>
    <th>Name</th>
    <th>Time In</th>
    <th>Time Out</th>
    <th>Time Consumed</th>
    <th>Tag</th>
    <th>Type</th>
    
</tr>
</thead>
<tbody id="."'tableBody'".">";
while($row=mysqli_fetch_row($result)){
    echo "<tr>
            <td>$row[1]</td>";
            $namequery="SELECT name FROM student where student_number='$row[1]'";
                $nameresult=mysqli_query($connect,$namequery);
                $name=mysqli_fetch_row($nameresult);
            echo "
            <td>$name[0]</td>
            <td>".date( "h:i:s a F d, Y", strtotime($row[2]))."</td>
            <td>".date( "h:i:s a F d, Y", strtotime($row[3]))."</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
            <td>$row[6]</td>
            </tr>";
}
echo "</tbody>"


?>