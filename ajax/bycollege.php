<?php

include 'conn.php';

$fromtime=$_POST['from'];
$totime=$_POST['to'];

$cs = array('MSMAT','BSBIO','BSCS','BSPHY','CS');
$cac= array('MALL','BALL','BACOM','BFA','CFA','CAC');
$css = array('CSS','BSME','BASS');
echo "<thead>
        <th>College</th>
        <th>Count</th>
        </thead>";
$csSQL="SELECT count(transaction.transaction_number) from transaction inner join student on transaction.student_number=student.student_number where (transaction.time_out between '$fromtime' and '$totime') AND";

foreach($cs as $course){
    if($course=='CS'){
        $csSQL=$csSQL." student.Acad_Prog='".$course."'";
    }else{
        $csSQL=$csSQL." student.Acad_Prog='".$course."' OR";
    }
}
echo $csSQL;
$row=mysqli_fetch_row(mysqli_query($connect,$csSQL));

echo "<tbody>
        <tr>
            <td>CS</td>
            <td>$row[0]</td>
        </tr>";
        
        $csSQL="SELECT count(transaction.transaction_number) from transaction inner join student on transaction.student_number=student.student_number where (transaction.time_out between '$fromtime' and '$totime') AND";

foreach($cac as $course){
    if($course=='CAC'){
        $csSQL=$csSQL." student.Acad_Prog='".$course."'";
    }else{
        $csSQL=$csSQL." student.Acad_Prog='".$course."' OR";
    }
}

$row=mysqli_fetch_row(mysqli_query($connect,$csSQL));

echo "<tr>
            <td>CAC</td>
            <td>$row[0]</td>
        </tr>";

        $csSQL="SELECT count(transaction.transaction_number) from transaction inner join student on transaction.student_number=student.student_number where (transaction.time_out between '$fromtime' and '$totime') AND";

foreach($css as $course){
    if($course=='BASS'){
        $csSQL=$csSQL." student.Acad_Prog='".$course."'";
    }else{
        $csSQL=$csSQL." student.Acad_Prog='".$course."' OR";
    }
}

$row=mysqli_fetch_row(mysqli_query($connect,$csSQL));

echo "<tr>
            <td>CSS</td>
            <td>$row[0]</td>
        </tr></tbody>";
?>