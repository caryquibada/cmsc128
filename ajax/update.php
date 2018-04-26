<?php
include 'conn.php';
$studentNum=$_POST['student'];
$sqlQuery="SELECT * FROM student WHERE student_number='$studentNum'";

$result=mysqli_query($connect,$sqlQuery);
while($row=mysqli_fetch_row($result)){
    echo "
    <label>Student Number: $row[0]</label><br/>
        <input type='hidden' name='sn' class='input-group' value='$row[0]'></input>    
    <label>Name:</label>
        <input type='text' name='name' class='input-group' value='$row[1]' maxlength='100' pattern='[A-Z]{2,49}, [A-Z]{1}[a-z]{2,50}( [A-Z]{1}.)?'></input>
    <label>Academic Program:</label>
        <input type='text' name='ap' class='input-group' value='$row[2]' maxlength='10' pattern='[A-Z]{2,10}'></input>
    <label>Tuition Discount:</label>
        <input type='text' name='td' class='input-group' value='$row[3]' maxlength='10'></input>
    <label>Tuition Bracket:</label>
        <input type='text' name='tb' class='input-group' value='$row[4]' maxlength='5' pattern='[A-E]{1}|[]' ></input> ";
}
?>