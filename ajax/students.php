<?php
    include 'conn.php';
    $student=$_POST['student'];
    $sql="SELECT * FROM transaction WHERE student_number='$student'";
    $result=mysqli_query($connect,$sql);
    while($row=mysqli_fetch_row($result)){
        echo "<tr>
                <td>".$row[0]."</td>
                <td>".$row[5]."</td>
                <td>".$row[6]."</td>
                <td>".$row[2]."</td>
                <td>".$row[3]."</td>
            </tr>";
    }
    mysqli_close($connect);
?>