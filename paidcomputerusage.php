<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=$_POST['from'];
    $totime=$_POST['to'];
    //Sql query
        $sql="SELECT * from payment where (date between '$fromtime' and '$totime') and type = 'Computer_Usage'";
                $result=mysqli_query($connect,$sql);
                echo "  
                <thead>
                <tr>
                <th>Tag</th>
                <th>Student Number</th>
                <th>Name</th>
                <th>Amount Due</th>
                <th>Status</th>
                <th>OR Number</th>
                <th>Date</th>
                <th>Date Paid</th>
                </tr>
                </thead>
                <tbody>";  
                while($row=mysqli_fetch_row($result)){
                echo "<tr>
                  <td>$row[9]</td>
                  <td>$row[0]</td>";
                  $namequery="SELECT name from student where student_number='$row[0]'";
                  $nameresult=mysqli_query($connect,$namequery);
                  $name=mysqli_fetch_row($nameresult);
                echo "
                  <td>$name[0]</td>     
                  <td>$row[2]</td>     
                  <td>$row[4]</td> 
                  <td>$row[5]</td>     
                  <td>$row[6]</td> 
                  <td>$row[7]</td> 
                  </tr>";
                }
                echo "</tbody>";
    
?>