<?php



session_start();


if(isset($_SESSION['login_user'])){
header("location: forget.php");
}

$error = "";

if(isset($_POST['submit'])){
	if(empty($_POST['user']) || empty($_POST['Pwd'])){
		$error = "Username and Password is invalid";
	}else{
		$user = $_POST['user'];
		$Pwd = $_POST['Pwd'];


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
						
				mysqli_select_db($conn,"test");
				
				$login=("SELECT user,Password FROM SignUpForm WHERE user='".$user."'AND Password='".$Pwd."' ");
				$check = mysqli_query($conn,$login);
				$rows = mysqli_fetch_array($check);
				
				if ($rows == 1){
					$_SESSION['login_user'] = $user;
					header("location: forget.php");
				}else{
					$error="Username and Password is invalid";
				}
				
				
		$conn->close();
	}
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
<form name="Login" action="forget.php" method="POST">

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
			<td><input type="submit" name="login" value="Login"></td>
			<td><span><?php echo $error; ?></span></td>
		</tr>
	</table>	
	</fieldset>

	</form>
	</body>
</html>