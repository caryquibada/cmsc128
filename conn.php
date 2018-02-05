<?php
	$connect = mysqli_connect('localhost','root','');
	
	if(!$connect){
		echo 'No connection to server';
	}
	if(!mysqli_select_db($connect,'lukedb')){
		echo 'Database "lukedb" is not selected';
	}
?>