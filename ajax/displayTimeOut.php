<?php
include 'conn.php';
$fromtime=$_POST['from'];
$totime=$_POST['to'];
if(!empty($_POST['per'])){
        if($_POST['per']=='hour'){
        $sql="SELECT month(time_out) as Month, day(time_out) as Day, hour(time_out) as Hour, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by month(time_out),day(time_out), hour(time_out)";
        $result=mysqli_query($connect,$sql);
//ID #2
echo "  
        <thead>
        <tr>
        <th>Month</th>
        <th>Day</th>
        <th>Hour</th>
        <th>Count</th>
        </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
          <td>$row[0]</td>
          <td>$row[1]</td>     
          <td>$row[2]</td>   
          <td>$row[3]</td> 
          </tr>";
}
echo "</tbody>";
        }else if($_POST['per']=='day'){
                $sql="SELECT month(time_out) as Month, day(time_out) as Day, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by month(time_out),day(time_out)";
        $result=mysqli_query($connect,$sql);
//ID #2
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
        }else if($_POST['per']=='month'){
                $sql="SELECT year(time_out),month(time_out) as Month, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by year(time_out), month(time_out)";
                $result=mysqli_query($connect,$sql);
//ID #2
                echo "  
        <thead>
        <tr>
        <th>Year</th>       
        <th>Month</th>
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
        }else if($_POST['per']=='week'){
                $sql="SELECT year(time_out),month(time_out),week(time_out) as Week, count(*) as Count from transaction where time_out between '$fromtime' and '$totime' group by year(time_out), month(time_out),week(time_out)";
                $result=mysqli_query($connect,$sql);
//ID #2
                echo "  
        <thead>
        <tr>
        <th>Year</th>       
        <th>Month</th>
        <th>Week</th>
        <th>Count</th>
        </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
          <td>$row[0]</td>
          <td>$row[1]</td>     
          <td>$row[2]</td>    
          <td>$row[3]</td>  
          </tr>";
}
echo "</tbody>";
        }
}else{
        $sql="SELECT * FROM transaction where time_out BETWEEN '$fromtime' AND '$totime' ORDER BY time_out DESC";

        $result=mysqli_query($connect,$sql);
//ID #2
echo "  
        <thead>
        <tr>
        <th>Student Number</th>
        <th>Time-out</th>
        <th>Time Consumed</th>
        </tr>
        </thead>
        <tbody>";

while($row=mysqli_fetch_row($result)){
    echo "<tr>
          <td>$row[1]</td>
          <td>$row[3]</td>     
          <td>$row[4]</td>   
          </tr>";
}
echo "</tbody>";
}


?>