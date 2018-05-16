<?php
    include 'conn.php';
    $query="SELECT * FROM payment where (type='Computer_Usage' OR type='Power_Usage')  AND status='UNPAID'";
    $result=mysqli_query($connect,$query);

    echo "<thead>
<tr>
    <th>Tag Number</th>
    <th>Type</th>
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
                <td>$row[9]</td>
                <td>$row[1]</td>";
                $namequery="SELECT name FROM student where student_number='$row[0]'";
                $nameresult=mysqli_query($connect,$namequery);
                $name=mysqli_fetch_row($nameresult);
            echo "<td>$name[0]</td>
                    <td>$row[0]</td>
                    <td>";
        echo date( "h:i:s a F d, Y", strtotime($row[6]));
        echo "</td>";
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
                    
                    if($row[1]=='Computer_Usage'){
                        $time=$time/15;
                        $time=floor($time);
                        $time=$time+1;
                        $time=floatval($time*5.00);
                    }else{
                        $time=$time/30;
                        $time=floor($time);
                        $time=$time+1;
                        $time=floatval($time*10.00);
                    }
                    mysqli_query($connect,"UPDATE payment SET amount_due=$time where transaction_number='$row[8]'");
                    $timeout=date( "h:i:s a F d, Y", strtotime($row[7]));
                    echo "<td>$timeout</td>";
                    
                    echo "<td>₱$time</td>";
                            if($row[4]=='UNPAID'){
                                echo "
                                <td><input type='text' class='$row[8]' minlength='7' maxlength='7' pattern='[0-9]{7}' required></input></td>
                                <td><button class='btn btn-group btn-primary OR' name='$row[8]'>UNPAID</button></td>
                                </tr>";
                            }else{
                                echo "
                                <td>$row[5]</td>
                                <td><b>PAID</b></td>
                                </tr>";
                            }
                    
                }

    }
    echo "</tbody>"
?>