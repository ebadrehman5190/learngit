<!doctype html>
<html>
<head>

<title>
Sign up form
</title>

<style>
.error {color: #FF0000;}
</style>

</head>
<body>

<?php
//define variables and set to empty values
$nameErr=$emailErr=$pwdErr=$cpwdErr=$confirmpwdErr=$countryErr=$genderErr=$AdminErr="";
$name=$email=$pwd=$cpwd=$country=$gender=$admin=$message="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (empty($_POST["name"])){
			$nameErr="name is required";
		} else {
			$name = test_input($_POST["name"]);
		}
		
		if (empty($_POST["email"])){
			$emailErr="email is required";
		} else {
			$email = test_input($_POST["email"]);
		}
		
		if (empty($_POST["pwd"])){
			$pwdErr="password is required";
		} else {
			$pwd = test_input($_POST["pwd"]);
		}
		
		if (empty($_POST["cpwd"])){
			$cpwdErr="confirm password required";
		} elseif ($_POST["pwd"] == $_POST["cpwd"]){
			$confirmpwdErr="password should be same";
		}  else {
			$cpwd = test_input($_POST["cpwd"]);
		}
		
		if (empty($_POST["country"])){
			$countryErr="country is required";
		} else {
			$country = test_input($_POST["country"]);
		}
		
		if (empty($_POST["gender"])){
			$genderErr="gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}
		
		if (empty($_POST[""])){
			$AdminErr="admin is required";
		} else {
			$admin = test_input($_POST["admin"]);
		}
		
		if (empty($_POST["message"])){
			$message="";
		} else {
			$message = test_input($_POST["message"]);
		}
	}
	
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>

<form action="" method="post">
	<fieldset>
	<legend><h1>Sign Up Form</h1></legend>
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name">
				<span class="error"><?php echo $nameErr;?></span></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email">
				<span class="error"><?php echo $emailErr; ?></span></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="pwd">
				<span class="error"><?php echo $pwdErr; ?></span></td>
			</tr>
			<tr>
				<td>Confirm password:</td>
				<td><input type="text" name="cpwd">
				<span class="error"> <?php echo $cpwdErr; ?></span></td>
			</tr>
			<tr>
				<td>Country:</td>
				<td>
					<select name="country">
						<option value="">Select country</option>
						<option value="Australia">Australia</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="India">India</option>
						<option value="Pakistan">Pakistan</option>
						<option value="U.S.A">U.S.A</option>
					</select>
				<span class="error"> <?php echo $countryErr; ?></span></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" value="Male">Male
					<input type="radio" name="gender" value="Female">Female
				<span class="error"> <?php echo $genderErr; ?></span></td>
			</tr>
			<tr>
				<td>Admin type:</td>
				<td><input type="checkbox" name="admin" value="Admin">Admin
					<input type="checkbox" name="admin" value="CoAdmin">CoAdmin
					<input type="checkbox" name="admin" value="User">User
				<span class="error"> <?php echo $AdminErr; ?></span></td>
			</tr>
			<tr>
				<td>Message:</td>
				<td><textarea name="message" rows="5" cols="40"></textarea><td>
			</tr>
			<tr>
				<td><input type="submit" value="submit"><td>
			</tr>
		</table>
	</fieldset>	
</form>

</body>
</html>