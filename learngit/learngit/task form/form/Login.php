<?php

$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
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
	 width:500px;
	 height:500px;
	 text-align:center;
	 margin-left:700px; 
	 margin-top:100px;
	 }
	 
	 
	body {
	background-image: url("SMWpCenterPinch.png");
	}
	
</style>
</head>
<body>
<form>

	<fieldset class="field_set">
	<h1>Login</h1>
	<table>
		<tr>
			<td><b>User:</td>
			<td><input type="text" name="uesr" id="user"></td>
		</tr>
		
		<tr></tr>
		
		<tr>
			<td><b>Password:</td>
			<td><input type="password" name="pwd" id="pwd"></td>
		</tr>
		
		<tr>
			<td><input type="submit" value="submit" ></td>
		</tr>
	</table>	
	</fieldset>

	</form>
	</body>
</html>