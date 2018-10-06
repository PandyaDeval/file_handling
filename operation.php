<?php

$con=mysqli_connect("localhost","root","") or die("cannot connect...");
if(!mysqli_select_db($con,"u16co010")){
	mysqli_query($con,"CREATE DATABASE u16co010");
	mysqli_select_db($con,"u16co010");
}

echo "<a href='index.php'>Home</a><br><br>";
@$operation=$_POST['operation'];
if($operation=='view'){
	$filename=$_POST['checklist'][0];
	$fetch_qry="SELECT `data` from `ass4` WHERE name='$filename'";
	$fetch_data=mysqli_fetch_row(mysqli_query($con,$fetch_qry));
	echo "<pre>";
	echo nl2br($fetch_data[0]);
	echo "</pre>";
}
else if($operation=='search'){
	$searchtext=$_POST['searchtext'];
	$filename=$_POST['checklist'][0];
	$fetch_qry="SELECT `data` from `ass4` WHERE name='$filename'";
	$fetch_data=mysqli_fetch_row(mysqli_query($con,$fetch_qry));
	$fetch_data=nl2br($fetch_data[0]);
	$offset=strpos($fetch_data,$searchtext);
	if($offset){
		echo "<script>alert('offset: $offset');window.location.assign('index.php');</script>";
	}
	else{
		echo "<script>alert('\'$searchtext\' not present in file \'$filename\'');window.location.assign('index.php');</script>";
		
	}
}
else if($operation=='delete'){
	if(isset($_POST['alldelete'])){
		$delete_qry="DELETE FROM `ass4`";
		mysqli_query($con,$delete_qry);
		echo "<script>alert('All files deleted successfully...');window.location.assign('index.php');</script>";
	}
	$count=0;
	foreach($_POST['checklist'] as $selected){
		$delete_qry="DELETE FROM `ass4` WHERE name='$selected'";
		mysqli_query($con,$delete_qry);
		$count+=1;
	}
	echo "<script>alert('$count file(s) deleted successfully...');window.location.assign('index.php');</script>";
}
else if($operation=='edit'){
	$filename=$_POST['checklist'][0];
	$fetch_qry="SELECT `data` from `ass4` WHERE name='$filename'";
	$fetch_data=implode(mysqli_fetch_row(mysqli_query($con,$fetch_qry)));
	echo "<form method='POST' action='edit_success.php'>
	<textarea style='width:70%;height:70%;margin:10%;' name='edittedtext'>$fetch_data</textarea><br>
	<input type='hidden' name='filename' value='$filename'/>
	<input type='submit' name='submit'/>
	</form>";
}
else{
	echo "<script>window.location.assign('index.php')</script>";
}
?>