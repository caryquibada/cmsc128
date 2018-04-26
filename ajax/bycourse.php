<?php
include 'conn.php';
$fromtime=$_POST['from'];
$totime=$_POST['to'];
$by=$_POST['by'];
if($by!=""){
        $sql="SELECT student.Acad_prog, count(transaction.transaction_number) as Count, student.student_number as SN from transaction inner join student on transaction.student_number=student.student_number where (transaction.time_out between '$fromtime' and '$totime') AND type='$by' group by student.Acad_prog";
}else{
        $sql="SELECT student.Acad_prog, count(transaction.transaction_number) as Count, student.student_number as SN from transaction inner join student on transaction.student_number=student.student_number where (transaction.time_out between '$fromtime' and '$totime') group by student.Acad_prog";
}


$result=mysqli_query($connect,$sql);
echo "<thead>
        <th>Course</th>
        <th>Count</th>
        </thead><tbody>";
while($row=mysqli_fetch_row($result)){
        if($row[0]!=''){
        echo "<tr>
                <td>$row[0]</td>
                <td>$row[1]</td></tr>";
        }
}
echo "</tbody>";
?>