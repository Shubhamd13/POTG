<?php
	$servername = "localhost";
	$username = "root";
	$password = "test";
	$conn = new mysqli($servername, $username, $password);
	$conn->select_db("printDB");
	$query= " select filename from files where isprinted=0";
	$result=$conn->query($query);
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		echo($row["filename"]);
		$query= "update files set isprinted=1 where filename='".$row["filename"]."';";
	$result=$conn->query($query);
		
	}else{
		echo("not found");
	}
	$conn->close();
?>
