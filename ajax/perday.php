<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=$_POST['from'];
    $totime=$_POST['to'];
    //Sql query
    $by=$_POST['by'];
    if($by=="none"){
        $sql="SELECT month(time_out) as Month, day(time_out) as Day, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by month(time_out),day(time_out)";
                $result=mysqli_query($connect,$sql);
                echo "  
                <thead>
                <tr>
                <th>Month</th>
                <th>Day</th>
                <th>Count</th>
                </tr>
                </thead>
                <tbody>";
                
                while($row=mysqli_fetch_row($result)){
                echo "<tr>
                  <td>$row[0]</td>
                  <td>$row[1]</td>     
                  <td>$row[2]</td> 
                  </tr>";
                }
                echo "</tbody>";
    }else if($by=="course"){
        echo "  
        <thead>
        <tr>
 
        <th>Course</th>
        <th>Month</th>
        <th>Day</th>
        <th>Count</th>
        </tr>
        </thead>
        <tbody>";
        $sql="SELECT month(transaction.time_out) as Month, day(transaction.time_out) as Day, count(transaction.transaction_number) as Count, student.student_number as SN from transaction inner join student on transaction.student_number=student.student_number where (transaction.time_out between '$fromtime' and '$totime') group by month(transaction.time_out),day(transaction.time_out)";
        $result=mysqli_query($connect,$sql);

        
        while($row=mysqli_fetch_row($result)){
        $query="SELECT Acad_prog from student where student_number='$row[3]'";
        $results=mysqli_query($connect,$query);
        $course=mysqli_fetch_row($results);
        echo "<tr>
            <td>$course[0]</td>
          <td>$row[0]</td>
          <td>$row[1]</td>     
          <td>$row[2]</td> 
          </tr>";
        }
        echo "</tbody>";
    }
?>