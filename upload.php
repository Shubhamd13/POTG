<?php
session_start();
if(!isset($_SESSION['PH']))
{
header("Location:/index.php");
}
else{
echo $_SESSION['PH'];
}
   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      //connection is required
	$servername = "localhost";
	$username = "root";
	$password = "test";
	$phone=$_SESSION['PH'];
	$conn = new mysqli($servername, $username, $password);
	$conn->select_db("printDB");
	 $query= "insert into files values('$file_name','$file_size','$file_tmp','$file_type','0') ;";
		 	 $conn->query($query);
	$query= "insert into uploads values('$file_name','$phone') ;";
		 	 $conn->query($query);
      $expensions= array("jpeg","jpg","png","txt");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
	header('Location:'."/homepage.php");

   }
?>
<html>
<style>
#file{
background-color:#FD7272;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin-bottom:10px;
}
#submit{
background-color:#FD7272;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin-bottom:10px;
}
#login_button{
background-color:#FD7272;
padding:5px;
width:100%;
color:white;
text-align:center;
font-size:20px;
font-weight:bold;
margin-bottom:10px;
}
.picture{
width:350px;
text-align:center;
 
}
.myform{
width:550px;
margin:0 auto;
}

</style>
   <body style="background-color:#f1c40f">
	<center>

	<img src="img/otgp-logo.png" class="picture"/><br><br>
	</center>
      
      <form class="myform" action="" method="POST" enctype="multipart/form-data">
      
      <input type="file" name="image" id="file" value="CHOOSE YOUR FILE"/>
      <input type="submit" id="submit" value="SUBMIT"/>
	     
	</form>
   </body>
</html>
