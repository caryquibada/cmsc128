<?php
include 'conn.php';
error_reporting(0);
//#1
if (isset($_POST['studentNumber'])&&!empty($_POST['studentNumber'])){
    $sn=$_POST['studentNumber'];
    $tagno=$_POST['tagnumber'];
    $type=$_POST['type'];

    $query="SELECT * FROM student";
    $checker=0;
    $result=mysqli_query($connect,$query);
    while($row=mysqli_fetch_array($result)){
        $output=$row['student_number'];
        if($output==$sn){
            $checker=1;
            break;
        }
    }
    if($checker==0){
        echo $checker; 
        die();
    }
        if($type=='Power_Usage'){
            $checkerSQL="SELECT time_remaining from student where student_number='$sn'";
            $resultChecker=mysqli_query($connect,$checkerSQL);
            $arr=mysqli_fetch_assoc($resultChecker);
            if($arr['time_remaining']==0){
                $checker=2;
                echo $checker;
                mysqli_close($connect);
                die();
            }else{
                $currentSQL="SELECT student_number from transaction where time_out='0000-00-00 00:00:00' AND type='$type'";
                $resultCurrent=mysqli_query($connect,$currentSQL);
                $current=mysqli_fetch_assoc($resultCurrent);
                if(in_array($sn,$current)){
                    $checker=3;
                    echo $checker;
                    die();
                    
                }else{
                    $sql="INSERT INTO transaction(student_number,tag_no,type) VALUES ('$sn','$tagno','$type')";
                    mysqli_query($connect,$sql);
                    echo $checker;
                    die();
                }
                
            }
        }
        $currentSQL="SELECT student_number from transaction where time_out='0000-00-00 00:00:00' AND type='$type' AND student_number='$sn'";
                $resultCurrent=mysqli_query($connect,$currentSQL);
                $current=mysqli_fetch_assoc($resultCurrent);
                if(in_array($sn,$current)){
                    $checker=3;
                    echo $checker;
                    die();
                }else{
                    $sql="INSERT INTO transaction(student_number,tag_no,type) VALUES ('$sn','$tagno','$type')";
                    mysqli_query($connect,$sql);
                    echo $checker;
                    die();
                }
    
}
//End of #1
?>