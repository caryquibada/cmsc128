<?php
        include 'conn.php';
    
        $sql="SELECT * FROM student";
        $result=mysqli_query($connect,$sql);
        echo "<table id="."'tableHolder'"." class="."table table-sm"." width='100%'>
                <thead>
                    <tr>
                        <th></th>
                        <th hidden></th>
                        <th>Student Number</th>
                        <th>Name</th>
                        <th>Degree Program</th>
                        <th>Tuition Discount</th>
                        <th>Tuition Bracket</th>
                        <th>Time Remaining</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>";
        while($row=mysqli_fetch_row($result)){
            echo "<tr>
                    <td></td>
                    <td hidden>$row[0]</td>
                    <td><button type="."'button'"." class="."'btn btn-unique btn-md'"." data-toggle="."'modal'"." data-target="."'#myModal'"." id=".$row[0].">".$row[0]."</button></td>
                    <td>$row[1]</td>
                    <td>$row[2]</td>
                    <td>$row[3]</td>
                    <td>$row[4]</td>
                    <td>";
                    $timerem=$row[5]/3600;
                    if(!function_exists('ceiling')){
                        function ceiling($number, $significance = 1){
                        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
                        }
                    }
                    $timerem=ceiling($timerem,0.005);   //ID 7
                    echo "$timerem hours</td>
                    <td><button type='button' class='btn btn-unique btn-md' data-toggle='modal' data-target='#myModal1' id=".$row[0].">UPDATE</button>
                    <input type='hidden' value=$row[0] class='hideme'/>
                    <button type='button' class='btn btn-unique btn-md delete' id=".$row[0].">DELETE</button>
                    <button type='button' class='btn btn-unique btn-md reset' id=".$row[0].">RESET</button>
                    
                    </td>
                </tr>";
        }
        echo "  </tbody>
            </table>";
        ?>