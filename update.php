 <?php

session_start();
$servername = "localhost";
$username = "root";
$password = "test";
$dbname = "printDB";
if(isset($_POST['login'])){
$conn = new mysqli($servername, $username, $password, $dbname);
$uusername=$_POST['uusername'];
$sql = "UPDATE print SET firstname='$uusername' WHERE phone='".$_SESSION['PH']."';";
$conn->query($sql) ;
echo ($conn->error);
$conn->close();
$_SESSION["usr"]=$uusername;
header("LOCATION: /homepage.php");
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
.inputvalues{
width:430px;
margin:0 auto;
padding:5px;
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
<title>LOGIN PAGE</title>

</head>
<body style="background-color:#f1c40f">

	<div id="main-wrapper">
	
	<center>

	<img src="img/otgp-logo.png" class="picture"/><br>
	</center>	
	
  <form class= "myform" action="update.php" method="post">
  <label><b>NEW USERNAME</label><br>
  <input name="uusername" type="text" class="inputvalues" placeholder="PLEASE ENTER NEW USERNAME" required/><br>
 <input name="login" type="submit" id="login_button" value="UPDATE"/><br><br>
 
</form>
</div>

</body>
</html>
