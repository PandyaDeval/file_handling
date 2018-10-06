<?php

$con=mysqli_connect("localhost","root","") or die("cannot connect...");
if(!mysqli_select_db($con,"u16co010")){
		mysqli_query($con,"CREATE DATABASE u16co010");
		mysqli_select_db($con,"u16co010");
}

$filename=$_POST['filename'];
$edittedtext=addslashes($_POST['edittedtext']);

$update_qry="UPDATE `ass4` SET data='$edittedtext' WHERE name='$filename'";
if(mysqli_query($con,$update_qry)){
	echo "<script>alert('\'$filename\' updated successfully...');window.location.assign('index.php');</script>";
}

?>