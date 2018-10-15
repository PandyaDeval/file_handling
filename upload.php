<html>
<link rel='stylesheet' href='styles.css'>
<body>
<a href='index.php'><button>Home</button></a><br><br>

<form method='POST' enctype="multipart/form-data">
Choose File <input type='file' name='textfile' accept='.txt'/><br><br>

Save as <input type='text' name='saveas'/><br><br>
<input type='submit' name='submit'/>
</form>
</body>
</html>


<?php

if(isset($_POST['submit'])){
	$con=mysqli_connect("localhost","root","") or die("cannot connect...");
	if(!mysqli_select_db($con,"u16co010")){
		mysqli_query($con,"CREATE DATABASE u16co010");
		mysqli_select_db($con,"u16co010");
	}

	$filename=$_POST['saveas'];
	$filecontents=file_get_contents($_FILES['textfile']['name']);
	$upload_qry="INSERT INTO `ass4`(`name`,`data`) VALUES('$filename','$filecontents')";
	if(!mysqli_query($con,$upload_qry)){
		mysqli_query($con,"CREATE TABLE `ass4`(name VARCHAR(255), data LONGTEXT)");
		mysqli_query($con,$upload_qry);
	}
	echo "<script>alert('File uploaded successfully...');window.reload();</script>";
}
?>