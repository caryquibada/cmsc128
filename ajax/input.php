<?php
include 'conn.php';
//#1
if (isset($_POST['studentNumber'])&&!empty($_POST['studentNumber'])){
    $sn=$_POST['studentNumber'];
    $tagno=$_POST['tagnumber'];
    echo $tagno;
    $sql="INSERT INTO transaction(student_number,tag_no) VALUES ('$sn','$tagno')";
    if(!mysqli_query($connect,$sql)){
        echo "Error";
    }
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
    }
}
//End of #1
?>