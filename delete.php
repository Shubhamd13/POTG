<?php

echo "DELETE FROM DATABASE WILL DELETE ALL THE DATA";
?>

<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "printDB";
if(isset($_POST['delete'])){
$conn = new mysqli($servername, $username, $password, $dbname);


$sql = "DELETE FROM print WHERE phone='".$_SESSION['PH']."';" ;


$conn->query($sql) ;

echo ($conn->error);

$conn->close();

header('Location: /index.php');
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
width:100px;
text-align:center;
width:250px;
}
.myform{
width:450px;
margin:0 auto;
}

#login_button{
background-color:#B33771;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;

}

</style>
<title>DELETE PAGE</title>

</head>
<body style="background-color:#f1c40f">

	<div id="main-wrapper">
	
	<center>

	<img src="img/otgp-logo.png" class="picture"/><br>
	</center>	
	
  <form class= "myform" action="delete.php" method="post">

<input name="delete" type="submit" id="login_button" value="DELETE"/><br><br></form>


 

</div>

</body>
</html>
