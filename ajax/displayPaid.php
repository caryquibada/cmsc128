<?php

include 'conn.php';

$sql="SELECT * FROM payment WHERE status='UNPAID' AND (type='Printing' OR type='Scanning') ORDER BY date";
$result=mysqli_query($connect,$sql);

echo "<thead>
<tr>
    <th>Date/Time</th>
    <th>Student Number</th>
    <th>Name</th>
    <th>Type</th>
    <th>Amount Due</th>
    <th>Copies</th>
    <th>OR Number</th>
    <th>Status</th>
    <th>Date Paid</th>
    
</tr>
</thead>
<tbody id="."'tableBody'".">";
while($row=mysqli_fetch_row($result)){
    echo "<tr>
            <td>$row[6]</td>
            <td>$row[0]</td>
            ";
        $namequery="SELECT name from student where student_number='$row[0]'";
        $nameresult=mysqli_query($connect,$namequery);
        $name=mysqli_fetch_row($nameresult);
    echo  "<td>$name[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>";
        if($row[5]==""){
            echo "<td><input type='text' id='$row[8]' class='form-group' minlength='7' maxlength='7' pattern='([1-9])+'></input></td>";
        }else{
            echo "<td>$row[5]</td>";
        }
        
        if($row[4]=="UNPAID"){
            echo "<td><button id='$row[8]' class='btnSelect btn btn-primary'>$row[4]</button></td>
                    <td>UNPAID</td>";
        }else{
            echo "<td>PAID</td>
            <td>";
            echo date( "h:i:s A F d, Y", strtotime($row[7]));
            echo "</td>";
        }
            echo "</tr>";
}
echo "</tbody>"
?>