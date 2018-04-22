<?php
include 'conn.php';

$sql="SELECT * FROM transaction WHERE YEAR(time_out)='0000' AND Type='E-Resources' ORDER BY time_in DESC";
$result=mysqli_query($connect,$sql);
//ID #2
echo "<thead>
<tr>
    <th>Tag Number</th>
    <th>Name</th>
    <th>Student Number</th>
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
    echo "<tr>
            <td>$row[5]</td>
            <td>$name</td>
            <td>$row[1]</td>";

            echo "
            <td>";
        echo date( "h:i:s A F d, Y", strtotime($row[2]));
        echo "</td>
            
            <td><button class="."'btnSelect btn btn-unique'"." id='".$row[6]." ".$row[0]."' name='<br>Tag: ".$row[5]."<br>Student Number: ".$row[1]."'>Time-out</button></td>
          </tr>";

    
}
echo "</tbody>";
?>