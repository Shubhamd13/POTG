<?php
session_start();
if(!isset($_SESSION['PH'])){
	if(!isset($_POST['username'])&&!isset($_POST['password'])){
		header('Location: /index.php');
	}
	$usernam=$_POST['username'];
	$passwor=$_POST['password'];
	//connection is required
	$servername = "localhost";
	$username = "root";
	$password = "test";

	$conn = new mysqli($servername, $username, $password);
	$conn->select_db("printDB");
	$query= "select password from print where firstname='$usernam';";
	$result= $conn->query($query);
	echo $conn->error;
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		if($row['password']==$passwor){
			$query= "select phone from print where firstname='$usernam';";
		 	$result= $conn->query($query);
			if ($result->num_rows > 0){
				$row = $result->fetch_assoc();
				$_SESSION['PH']=$row['phone'];
			}
		}else{
			header('Location: /index.php');
		}
	}else{
		header('Location: /index.php');
	}
}else{	
	$servername = "localhost";
	$username = "root";
	$password = "test";

	$conn = new mysqli($servername, $username, $password);	
	$conn->select_db("printDB");
	$query= "select firstname from print where phone=".$_SESSION['PH'].";";
	$result= $conn->query($query);
	echo $conn->error;
	if ($result->num_rows > 0){
		$row = $result->fetch_assoc();
		$usernam=$row["firstname"];
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
#main-wrapper{
width:500px;
margin: 0 auto;
background:white;
padding:5px;
border-radius:10px;
border: 2px solid #2c3e50;
}
.picture{
width:150px;
text-align:center;
border-radius:10%; 
}
.myform{
width:450px;
margin:0 auto;
}

#logout_button{
background-color:#2980b9;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin:10px;

}

#update_button{
background-color:#8e44ad;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin:10px;

}
#upload{
background-color:#8e44ad;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin:10px;
}
#delete_button{
background-color:red;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin:10px;
}
</style>
<title>HOME PAGE</title>

</head>
<body style="background-color:#16a085">
	<div id="main-wrapper">
	<center>
		<h2>HOME PAGE</h2>
		<h2>WELCOME <?php echo $usernam ?></h2>
		<img src="img/otgp-logo.png" class="picture"/>
	</center>	
	<form class="myform" action="upload.php" method="post" enctype="multipart/form-data">
	<input type="SUBMIT" id="upload" value="UPLOAD"/></a><br><br></form>
	
	<form class="myform" action="index.php" method="post" ">
	<input type="SUBMIT" id="logout_button" value="LOG OUT"/></a><br><br></form> 

	<form class="myform" action="update.php" method="post" ">
	<input type="SUBMIT" id="logout_button" value="UPDATE NAME"/></a><br><br></form> 

	<form class="myform" action="delete.php" method="post" ">
	<input type="SUBMIT" id="delete_button" value="DELETE FROM DATABASE"/></a><br><br></form> 


</div>

</body>
</html>
 
