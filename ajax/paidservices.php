<?php
    include 'conn.php';
    //Obtaining From time and To time
    $fromtime=date("Y-m-d", strtotime($_POST['from']));
    $totime=date("Y-m-d", strtotime($_POST['to']));
    $by=$_POST['by'];
    //Sql query
    if($by=='all'){
      $sql="SELECT * from payment where (date between '$fromtime' and '$totime')";
    }else{
      $sql="SELECT * from payment where (date between '$fromtime' and '$totime') and type = '$by'";
    }
    //Sql query
                $result=mysqli_query($connect,$sql);
                echo "  
                <thead>
                <tr>
                <th>Student Number</th>
                <th>Name</th>
                <th>Type</th>
                <th>Amount Due</th>
                <th>No. of Copies</th>
                <th>Status</th>
                <th>OR Number</th>
                <th>Date</th>
                <th>Date Paid</th>
                </tr>
                </thead>
                <tbody>";  
                while($row=mysqli_fetch_row($result)){
                echo "<tr>
                  <td>$row[0]</td>";
                  $namequery="SELECT name from student where student_number='$row[0]'";
                  $nameresult=mysqli_query($connect,$namequery);
                  $name=mysqli_fetch_row($nameresult);
                echo "
                  <td>$name[0]</td>
                  <td>$row[1]</td>     
                  <td>$row[2]</td> 
                  <td>$row[3]</td>     
                  <td>$row[4]</td> 
                  <td>$row[5]</td>     
                  <td>";
        echo date( "h:i:s A F d, Y", strtotime($row[6]));
        echo "</td>
        <td>";
        echo date( "h:i:s A F d, Y", strtotime($row[7]));
        echo "</td>
                  </tr>";
                }
                echo "</tbody>";
    
?>