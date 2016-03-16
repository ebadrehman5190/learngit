<?php
include('index.php'); // Includes Login Script

if(isset($_SESSION['login_user'])){
header("location: forget.php");
}
?>
<doctype html>
<html>
<head>

<title>Login Page</title>
<style>
	.error {color: #FF0000;}
	
	 .field_set{
	 background-color:white;
	 border:solid;
	 width:400px;
	 height:200px;
	 text-align:center;
	 margin-left:800px; 
	 margin-top:150px;
	 }
	 
	 
	body {
	background-image: url("SMWpCenterPinch.png");
	}
	
</style>
</head>
<body>
<form action="" method="POST">

	<fieldset class="field_set">
	<h1>Login</h1>
	<table>
		<tr>
			<td><b>User:</td>
			<td><input type="text" name="user" id="user"></td>
		</tr>
		
		<tr></tr>
		
		<tr>
			<td><b>Password:</td>
			<td><input type="password" name="pwd" id="pwd"></td>
		</tr>
		
		<tr>
			<td><input type="submit" name="login" value="Login"></td>
			<td><span class="error"><?php echo $error; ?></span></td>
		</tr>
	</table>	
	</fieldset>

	</form>
	</body>
</html>