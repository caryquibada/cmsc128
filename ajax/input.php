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
    echo $checker;
    if($checker==0){
        $response_array['status'] = 'error';  
    }else{
        $sql="INSERT INTO transaction(student_number,tag_no,type) VALUES ('$sn','$tagno','$type')";
        if(!mysqli_query($connect,$sql)){
            echo $sql;
            echo "Error";
        }
    }
    
}
//End of #1
?>