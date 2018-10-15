<!--<form method='POST'>
<input type='checkbox' name='list[]' value='xyz'/><br>
<input type='checkbox' name='list[]' value='abc'/><br>
<input type='submit' name='submit'/>
</form>-->
<?php

	
	/*if(!empty($_POST['list'])){
		foreach($_POST['list'] as $row){
			echo "$row<br>";
		}
		#echo $_POST['list'][0];
	}*/
	
$con=mysqli_connect("localhost","root","") or die("cannot connect...");
if(!mysqli_select_db($con,"test")){
	mysqli_query($con,"CREATE DATABASE test");
	mysqli_select_db($con,"test");
}

#$qry="LOAD DATA INFILE 'C:/xampp/htdocs/deval/assignment4/data.txt' INTO TABLE `ass4`";
#$qry="INSERT INTO `ass4`(`data`) VALUES(LOAD_FILE('C:/xampp/htdocs/deval/assignment4/data.txt'))";
$qry="INSERT INTO `ass4`(`data`) VALUES(LOAD_FILE('C:\Users\Lenovo\Desktop\SVNIT\DBMS\TEST.txt'))";
if(!mysqli_query($con,$qry)){
	mysqli_query($con,"CREATE TABLE `ass4`(data LONGTEXT)");
	mysqli_query($con,$qry);
	echo "done";
}


?>