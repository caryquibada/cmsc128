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

$tranNum=$_POST['tranNum'];
$tranNum=explode(" ",$tranNum);
$sql="UPDATE transaction SET time_out=CURRENT_TIMESTAMP WHERE transaction_number=$tranNum[1]";
mysqli_query($connect,$sql);


$settingsql="SELECT charge_computer from settings";
$settingresult=mysqli_query($connect,$settingsql);
$result=mysqli_fetch_array($settingresult);
if($tranNum[0]=='Power_Usage'){

$timeinsql="SELECT time_in from transaction WHERE transaction_number=$tranNum[1]";
$timeinresult=mysqli_query($connect,$timeinsql);
$time_in=mysqli_fetch_assoc($timeinresult);

$timeoutsql="SELECT time_out from transaction WHERE transaction_number=$tranNum[1]";
$timeoutresult=mysqli_query($connect,$timeoutsql);
$time_out=mysqli_fetch_assoc($timeoutresult);
$timei=$time_in['time_in'];
$timeo=$time_out['time_out'];

$resultsql="SELECT TIMESTAMPDIFF(SECOND,'$timei','$timeo') as 'result'";
$result=mysqli_query($connect,$resultsql);
$results=mysqli_fetch_assoc($result);


$sqlsql="SELECT student_number FROM transaction where transaction_number=$tranNum[1]";
$resultsn=mysqli_fetch_assoc(mysqli_query($connect,$sqlsql));
$resultsn1=$resultsn['student_number'];

$timecon=$results['result'];

$timeconsquery="SELECT 
CONCAT(MOD(HOUR(SEC_TO_TIME($timecon)), 24), 'H:',
    MINUTE(SEC_TO_TIME($timecon)), 'Min:',
    second(SEC_TO_TIME($timecon)), 'Sec') as 'consumed'";
$resultsconsumed=mysqli_fetch_assoc(mysqli_query($connect,$timeconsquery));
$consumed=$resultsconsumed['consumed'];
$sql="UPDATE transaction SET time_consumed='$consumed' WHERE transaction_number=$tranNum[1]";
mysqli_query($connect,$sql);

$sqll="SELECT time_remaining FROM student where student_number='$resultsn1'";
$resulttime=mysqli_fetch_assoc(mysqli_query($connect,$sqll));
$timerem=(int)$resulttime['time_remaining'];
$timerem=$timerem-$timecon;
$sql="UPDATE student SET time_remaining=$timerem WHERE student_number='$resultsn1'";
mysqli_query($connect,$sql);
$timebefore=$timerem/3600;
$timebefore=convertTime($timebefore);
$timedisplay=$timerem/3600;
$timedisplay=convertTime($timedisplay);
$timei=date( "h:i:s a F d, Y", strtotime($timei));
$timeo=date( "h:i:s a F d, Y", strtotime($timeo));
echo "Time in:".$timei."\tTime-out: ".$timeo."\tTime Consumed: ".$consumed."\tTime Before:".$timebefore."\tTime After: ".$timedisplay;

}else{
    $timeinsql="SELECT time_in from transaction WHERE transaction_number=$tranNum[1]";
$timeinresult=mysqli_query($connect,$timeinsql);
$time_in=mysqli_fetch_assoc($timeinresult);

$timeoutsql="SELECT time_out from transaction WHERE transaction_number=$tranNum[1]";
$timeoutresult=mysqli_query($connect,$timeoutsql);
$time_out=mysqli_fetch_assoc($timeoutresult);
$timei=$time_in['time_in'];
$timeo=$time_out['time_out'];

$resultsql="SELECT TIMESTAMPDIFF(SECOND,'$timei','$timeo') as 'result'";
$result=mysqli_query($connect,$resultsql);
$results=mysqli_fetch_assoc($result);


$sqlsql="SELECT student_number FROM transaction where transaction_number=$tranNum[1]";
$resultsn=mysqli_fetch_assoc(mysqli_query($connect,$sqlsql));
$resultsn1=$resultsn['student_number'];

$timecon=$results['result'];

$timeconsquery="SELECT 
CONCAT(MOD(HOUR(SEC_TO_TIME($timecon)), 24), 'H:',
    MINUTE(SEC_TO_TIME($timecon)), 'Min:',
    second(SEC_TO_TIME($timecon)), 'Sec') as 'consumed'";
$resultsconsumed=mysqli_fetch_assoc(mysqli_query($connect,$timeconsquery));
$consumed=$resultsconsumed['consumed'];
$sql="UPDATE transaction SET time_consumed='$consumed' WHERE transaction_number=$tranNum[1]";
mysqli_query($connect,$sql);
$timei=date( "h:i:s a F d, Y", strtotime($timei));
$timeo=date( "h:i:s a F d, Y", strtotime($timeo));
echo "Time in: ".$timei."\tTime-out: ".$timeo."\tTime Consumed: ".$consumed;
}
?>