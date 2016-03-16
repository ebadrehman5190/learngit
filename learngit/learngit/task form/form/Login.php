<?php
session_start();

	$error = "";

	if(isset($_POST['login'])){
		//die('here');
		if(empty($_POST['user']) || empty($_POST['pwd'])){
			//die('gwvf');
			$error = "Username or Password is empety";
		}else{
			//die('j');
			$user = $_POST['user'];
			$pwd = $_POST['pwd'];

				$conn = mysqli_connect('localhost','root','','test');
				mysqli_select_db($conn,"test");

											
					$login=("SELECT * FROM SignUpForm WHERE user='$user'AND Password='$pwd' ");
					$check = mysqli_query($conn,$login);
					$rows = mysqli_num_rows($check);
					
					//echo "SELECT * FROM signupform WHERE user='$user' AND Password='$pwd' "	;			
					//die;
					
					if ($rows == 1){
						$_SESSION['login_user']=$user;
						header("location:forget.php");
					}else{
						$error="Username and Password is invalid";
					}
					
					
			$conn->close();
		}
}



//print_r($_SESSION);

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