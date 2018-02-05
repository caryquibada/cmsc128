<?php
$connect = mysqli_connect('localhost','root','');

if(!$connect){
    echo 'No connection to server';
}
if(!mysqli_select_db($connect,'upblibusage')){
    echo 'Database "lukedb" is not selected';
}
$sql="SELECT * FROM transaction";
$result=mysqli_query($connect,$sql);
//ID #2
echo "  
        <thead>
        <tr>
        <th>Transaction Number</th>
        <th>Student Number</th>
        <th>Time-in</th>
        <th>Time-out</th>
        </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
          <td>$row[0]</td>
          <td>$row[1]</td>
          <td>$row[2]</td>
          <td>Timeout</td>
          </tr>";
}
echo "</tbody>";
?>