<?php

include 'conn.php';

$sql="SELECT * FROM payment WHERE (month(date)=month(CURRENT_TIMESTAMP) OR status='UNPAID') AND type ='Scanning' OR type = 'Printing'";
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
            echo "<td><input type='text' id='$row[8]' class='form-group'></input></td>";
        }else{
            echo "<td>$row[5]</td>";
        }
        
        if($row[4]=="UNPAID"){
            echo "<td><button id='$row[8]' class='btnSelect btn btn-unique'>$row[4]</button></td>
                    <td>UNPAID</td>";
        }else{
            echo "<td>PAID</td>
                    <td>$row[7]</td>";
        }
            echo "</tr>";
}
echo "</tbody>"
?>