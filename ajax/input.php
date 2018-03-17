<?php
include 'conn.php';
//#1
echo "test";
if (isset($_POST['studentNumber'])&&!empty($_POST['studentNumber'])){
    $sn=$_POST['studentNumber'];
    $tagno=$_POST['tagnumber'];
    $type=$_POST['type'];
    echo $tagno;

    $query="SELECT * FROM student";
    $checker=0;
    $result=mysqli_query($connect,$query);
    while($row=mysqli_fetch_array($result)){
        $output=$row['student_number'];
        if($output==$sn){
            $checker=1;
        }
    }

    if($checker==0){
        $studentquery="INSERT INTO student(student_number) VALUES ('$sn')";
        if(!mysqli_query($connect,$studentquery)){
            echo $sn;
            echo "Error1";
        }
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