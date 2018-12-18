<?php
session_unset();
//remove PHPSESSID from browser
if ( isset( $_COOKIE[session_name()] ) )
setcookie( session_name(),"", time()-3600, “/” );
//clear session from globals
$_SESSION = array();
//clear session from disk
session_destroy();
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
#register_button{
background-color:#FD7272;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin-bottom:10px;
}
</style>
<title>LOGIN PAGE</title>

</head>
<body style="background-color:#f1c40f">
	<div id="main-wrapper">
	  <center>
		<img src="img/otgp-logo.png" class="picture"/><br>
	  </center>	
	  <form class= "myform" action="homepage.php" method="post">
		  <label><b>USERNAME</label><br>
		  <input name="username" type="text" class="inputvalues" placeholder="PLEASE ENTER YOUR USERNAME" required/><br>
		  <label><b>PASSWORD</label><br>
		  <input name="password" type="password" class="inputvalues" placeholder="PLEASE ENTER YOUR PASSWORD" required/><br><br>
		  <input name="login" type="submit" id="login_button" value="LOGIN"/><br><br>
		  <a href="register.php"><input type="button" id="register_button" value="REGISTER"/></a>
	  </form>
	</div>
</body>
</html>
