 <?php
	session_start();
	//connection is required
	$servername = "localhost";
	$username = "root";
	$password = "test";

	$conn = new mysqli($servername, $username, $password);
	$username=$_POST['username'];  
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];
	$phone=$_POST['phone'];
	if($password==$cpassword){
		$sql = "CREATE DATABASE printDB;";
		$conn->query($sql);
		$conn->select_db("printDB");
		$sql = "CREATE TABLE print (
		firstname VARCHAR(30) NOT NULL,
		password varchar(50) NOT NULL,
		phone int(50),
		primary key(phone)
		);";
		$conn->query($sql);
		$sql= "select * from print where firstname='$username';";
		$result=$conn->query($sql);
		if ($result->num_rows > 0){	     
			$_SESSION["prblm"]='<script>alert("TRY ANOTHER NAME ALREADY EXISTS")</script>';
			$conn->close();
			header("LOCATION: /register.php");
		}else{
			$query= "insert into print values('$username','$password','$phone') ;";
		 	$conn->query($query);
			$_SESSION["PH"]=$phone;
			$_SESSION["usr"]=$username;
			$conn->close();
			header("LOCATION: /homepage.php");
		}
	}else{
		$_SESSION["prblm"]= '<script>alert("PASSWORDS DONT MATCH")</script>';
		$conn->close();
		header("LOCATION: /register.php");
	}	
?> 


