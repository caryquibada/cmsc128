<?php
    include 'conn.php';
    $query="SELECT * FROM vistransaction ";
    $result=mysqli_query($connect,$query);

    echo "<thead>
<tr>
    <th>Tag Number</th> 
    <th>Type</th>
    <th>Name</th>
    <th>Occupation</th>
    <th>Organization</th>
    <th>Alumni?</th>
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
                <td>$row[1]</td>
                <td>$row[5]</td>";
             
            echo "<td>$row[6]</td>
                    <td>$row[7]</td>
                    <td>$row[8]</td>
                    <td>$row[9]</td>
                
                    <td>";

        echo date( "h:i:s A F d, Y", strtotime($row[4]));
        echo "</td>";
        $timeoutyear=mysqli_fetch_row(mysqli_query($connect,"SELECT YEAR(time_out) from vistransaction where transaction_number='$row[0]'"));
        $timediff=mysqli_fetch_row(mysqli_query($connect,"SELECT TIMESTAMPDIFF(minute,'$row[4]','$row[3]')"));
     
        if($timeoutyear[0]==0000){
            
            echo "<td><button class='btnSelect btn btn-group btn-primary' id='$row[0]'>Time-out</button></td>
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
            mysqli_query($connect,"UPDATE vistransaction SET amount_due=$time where transaction_number='$row[0]'");
            $timeout=date( "h:i:s A F d, Y", strtotime($row[3]));
            echo "<td>$timeout</td>";
            
            echo "<td>$time</td>";
                    if($row[10]=='UNPAID'){
                        echo "
                        <td><input type='text' class='$row[0]' minlength='7' maxlength='7' pattern='[1-9]{7}' required></input></td>
                        <td><button class='btn btn-group btn-primary OR' name='$row[0]' >UNPAID</button></td>
                        </tr>";
                    }else{
                        echo "
                        <td>$row[11]</td>
                        <td><b>PAID</b></td>
                        </tr>";
                    }
            
        }
               

    }
    echo "</tbody>"
?>