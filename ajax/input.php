<?php
include 'conn.php';
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
    $query="SELECT student_number from transaction WHERE time_out='0000-00-00 00:00:00'";
    while($row=mysqli_fetch_array(mysqli_query($connect,$query))){
        if($row[0]==$sn){
            $checker=4;
            echo $checker;
            die();
        }
    }
    if($checker==0){
        $response_array['status'] = 'error';  
    }else{
        $remQuery="SELECT time_remaining from student WHERE student_number='$sn'";
        $result=mysqli_fetch_row(mysqli_query($connect,$remQuery));
        if(((int)$result[0]<=0)&&$type=='Power_Usage'){
            $checker=2;
        }else{
            if($type=="Computer_Usage"){
                $checker=3;
                $sql="INSERT INTO transaction(student_number,tag_no,type) VALUES ('$sn','$tagno','$type')";
                if(!mysqli_query($connect,$sql)){
                    echo $sql;
                    echo "Error";
                }
            }else{
                $sql="INSERT INTO transaction(student_number,tag_no,type) VALUES ('$sn','$tagno','$type')";
                    if(!mysqli_query($connect,$sql)){
                        echo $sql;
                        echo "Error";
                    }
            }
            
        }
        
    }
    
    echo $checker;
    
}
//End of #1
?>