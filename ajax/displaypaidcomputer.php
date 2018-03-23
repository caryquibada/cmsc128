<?php
    include 'conn.php';
    $query="SELECT * FROM payment where type='Computer_Usage'";
    $result=mysqli_query($connect,$query);

    echo "<thead>
<tr>
    <th>Tag Number</th>
    <th>Name</th>
    <th>Student Number</th>
    <th>Time-in</th>
    <th>Time-out</th>
    <th>Amount Due</th>
    <th>O.R Number</th>
    <th>Status</th>
</tr>
</thead>
<tbody id="."'tableBody'".">";
    while($row=mysqli_fetch_row($result)){
        echo "<tr>
                <td>$row[9]</td>";
                $namequery="SELECT name FROM student where student_number='$row[0]'";
                $nameresult=mysqli_query($connect,$namequery);
                $name=mysqli_fetch_row($nameresult);
            echo "<td>$name[0]</td>
                    <td>$row[0]</td>
                    <td>$row[6]</td>";
                $timeoutyear=mysqli_fetch_row(mysqli_query($connect,"SELECT YEAR(date_paid) from payment where transaction_number='$row[8]'"));
                $timediff=mysqli_fetch_row(mysqli_query($connect,"SELECT TIMESTAMPDIFF(minute,'$row[6]','$row[7]')"));
                if($timeoutyear[0]==0000){
                    echo "<td><button class='btnSelect btn btn-group btn-primary' id='$row[8]'>Time-out</button></td>
                        <td>UNPAID</td>
                        <td>NOT TIMED OUT</td>
                        <td>NOT TIMED OUT</td>
                        </tr>";
                }else{
                    $time=(int)$timediff;
                    $time=$time/15;
                    $time=floor($time);
                    $time=$time+1;
                    $time=floatval($time*5.00);
                    mysqli_query($connect,"UPDATE payment SET amount_due=$time where transaction_number='$row[8]'");
                    echo "<td>$time</td>
                            <td>$row[2]</td>";

                            if($row[4]=='UNPAID'){
                                echo "
                                <td><input type='text' class='$row[8]'></input></td>
                                <td><button class='btn btn-group btn-primary OR' name='$row[8]'>UNPAID</button></td>
                                </tr>";
                            }else{
                                echo "
                                <td>$row[5]</td>
                                <td>PAID</td>
                                </tr>";
                            }
                    
                }

    }
    echo "</tbody>"
?>