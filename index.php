<html>
<link rel='stylesheet' href='styles.css'>
<script>
function filesearch(operation){
	if(operation=="search"){
		document.getElementById("searchfield").innerHTML="Enter Search Text <input type='text' name='searchtext'/>";
	}
	else if(operation=="delete"){
		document.getElementById("searchfield").innerHTML="Delete All? <input type='checkbox' name='alldelete' value='aldelete'/>";
	}
	else{
		document.getElementById("searchfield").innerHTML="";
	}
}
</script>
<body>
<pre>

<a href='upload.php'><button>Upload File</button></a>
<form action="operation.php" method='POST'>

  View File<input type='radio' onclick="filesearch('view')" name='operation' value='view'/>	Search in File<input type='radio' value='search' onclick='filesearch("search")' name='operation'/> 	Delete File(s)<input type='radio' value='delete' onclick="filesearch('delete')" name='operation'/> 	Edit File<input type='radio' value='edit' onclick="filesearch('edit')" name='operation'/>

  <div id='searchfield'></div>


  FILES:-


<?php

$con=mysqli_connect("localhost","root","") or die("cannot connect...");
if(!mysqli_select_db($con,"u16co010")){
	mysqli_query($con,"CREATE DATABASE u16co010");
	mysqli_select_db($con,"u16co010");
}

if(mysqli_query($con,"SELECT COUNT(*) FROM `ass4`")){
	$count=mysqli_fetch_row(mysqli_query($con,"SELECT COUNT(*) FROM `ass4`"));
	$count=$count[0];
}
$fetch_qry="SELECT `name` from `ass4`";
$fetch_data=(mysqli_query($con,$fetch_qry));
while($count>0){
	$row=mysqli_fetch_row($fetch_data);
	echo "  <input type='checkbox' name='checklist[]' value='$row[0]'/>	$row[0]<br><br>";
	$count-=1;
}

?>

<input class='xyz' type='submit' name='submit'/>

</form>
</pre>
</body>
</html>



<?php


/*
$con=mysqli_connect("localhost","root","") or die("cannot connect...");
if(!mysqli_select_db($con,"u16co010")){
	mysqli_query($con,"CREATE DATABASE u16co010");
	mysqli_select_db($con,"u16co010");
}

if(mysqli_query($con,"SELECT COUNT(*) FROM `ass4`")){
	$count=mysqli_fetch_row(mysqli_query($con,"SELECT COUNT(*) FROM `ass4`"));
	$count=$count[0];
}

echo "<html>
<body>
<pre>
 <a href='upload.php'>Upload File</a>
 <a href='delete.php'>Delete File</a>
 <a href='edit.php'>Edit and Append</a>
 <a href='search.php'>Search Text</a>
 
 
</pre>
</body>
</html>";
*/
?>