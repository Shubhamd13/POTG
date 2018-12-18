<?php 
session_start();
if(isset($_SESSION["prblm"])){
	echo($_SESSION["prblm"]);
}
?>
</BODY>
</HTML>
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
background-color:#2980b9;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;

}
#register_button{
background-color:#9b59b6;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin-bottom:10px;
}
#back_button{
background-color:#9b59b6;
padding:5px;
width:50%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin-bottom:10px;

}
</style>
<title>REGISTRATION PAGE</title>

</head>
<body style="background-color:#16a085">

	<div id="main-wrapper">
	<center>
	<h2>REGISTRATION FORM</h2>
	<img src="img/otgp-logo.png" class="picture"/>
	</center>	
	
  <form class= "myform" action="test.php" method="post">
  <label><b>USERNAME</label><br>
  <input name="username" type="text" class="inputvalues" placeholder="PLEASE ENTER YOUR USERNAME" required/><br><br>
  <label><b>PASSWORD</label><br>
  <input name="password" type="password" class="inputvalues" placeholder="PLEASE ENTER YOUR PASSWORD" required/><br><br>
  <label><b>CONFIRM PASSWORD</label>
  <input name="cpassword" type="password" class="inputvalues" placeholder="ENTER PASSWORD AGAIN" required/><br><br>
  PHONE
  <input name="phone" type="text" pattern="[789][0-9]{9}" class="inputvalues" placeholder="ENTER YOUR PHONE NUMBER" required/><br><br>
  <input name="submit" type="submit" id="login_button" value="SIGN UP"/><br><br>
  <a href="index.php"><input name="back_button" type="button" id="back_button" value="GO BACK"/><br><br></a>
  
</form>

</div>

</body>
</html>
