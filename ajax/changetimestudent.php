<?php
function convertTime($dec)
{
    // start by converting to seconds
    $seconds = ($dec * 3600);
    // we're given hours, so let's get those the easy way
    $hours = floor($dec);
    // since we've "calculated" hours, let's remove them from the seconds variable
    $seconds -= $hours * 3600;
    // calculate minutes left
    $minutes = floor($seconds / 60);
    // remove those from seconds as well
    $seconds -= $minutes * 60;
    // return the time formatted HH:MM:SS
    return lz($hours).":".lz($minutes);
}
function lz($num)
{
    return (strlen($num) < 2) ? "0{$num}" : $num;
}

    include 'conn.php';
    $stuNum=$_POST['student'];
    $sql="SELECT time_remaining from student where student_number='$stuNum'";
    $result=mysqli_query($connect,$sql);
    $row=mysqli_fetch_row($result);
    $timerem=$row[0]/3600;
	if(!function_exists('ceiling')){
		function ceiling($number, $significance = 1){
		return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
		}
	}
    $timerem=ceiling($timerem,0.005);   //ID 7
    $timerem=convertTime($timerem);
    echo "<input type='text' value='$timerem' id='$stuNum' maxlength='5' name='timerem'>";
    
?>