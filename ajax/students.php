<?php
    include 'conn.php';
    $student=$_POST['student'];
    $sql="SELECT * FROM transaction WHERE student_number='$student'";
    $result=mysqli_query($connect,$sql);
    echo "<thead>
            <tr>
                <th>Student Number</th>
            </tr>
        </thead>
        <tbody>";
    while($row=mysqli_fetch_row($result)){
        echo "<tr>
                <td>".$row[0]."</td>
            </tr>";
    }
    echo "</tbody>";
?>