<!doctype html>
<html>
<head>

<title>
Sign up form
</title>

<script>
function validateForm() {
var alertType ="Name= "+name+"Email="+email+"pass="+password+"confirmpass="+confirmpassword+;
	alert(alertType);
	
	if (name == "") {
        alert("Name must be filled out");
        return false;
    }
	if (email == "") {
		alert("email must be filled out");
		return false;
	}
	if (password == "") {
		alert("password must be filled out");
		return false;
	}
	if (password.length < 8) {
		alert("password must contain 8 digits");
		return false;
	}
	if (password != confirmpassword) {
		alert("confirm password should be same");
		return false;
	}
	return true;
}
</script>
</head>
<body>
<form action="" method="POST">
	<fieldset>
	<legend><h1>Sign Up Form</h1></legend>
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" id="name" onclick="alert validateForm()"></td>
				<td><dialog id="nameErr"></dialog></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" id="email" onclick="validateForm()"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="pwd" id="pwd"></td>
			</tr>
			<tr>
				<td>Confirm password:</td>
				<td><input type="text" name="cpwd" id="cpwd"></td>
			</tr>
			<tr>
				<td>Country:</td>
				<td>
					<select name="country" id="country">
						<option value="">Select country</option>
						<option value="Australia">Australia</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="India">India</option>
						<option value="Pakistan">Pakistan</option>
						<option value="U.S.A">U.S.A</option>
					</select></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" id="gender" value="Male" checked>Male
					<input type="radio" name="gender" id="gender" value="Female">Female</td>
			</tr>
			<tr>
				<td>Admin type:</td>
				<td><input type="checkbox" name="admin" value="Admin">Admin
					<input type="checkbox" name="admin" value="CoAdmin">CoAdmin
					<input type="checkbox" name="admin" id="admin" value="User" checked>User</td>
			</tr>
			<tr>
				<td>Message:</td>
				<td><textarea name="message" id="message" rows="5" cols="40"></textarea><td>
			</tr>
			<tr>
				<td><input type="submit" value="submit"><td>
			</tr>
		</table>
	</fieldset>	
</form>

<?php
$name = $_POST["name"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$cpwd = $_POST["cpwd"];
$country = $_POST["country"];
$gender = $_POST["gender"];
$admin = $_POST["admin"];
$message = $_POST["message"];
?>

<?php
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $pwd;
echo "<br>";
echo $cpwd;
echo "<br>";
echo $country;
echo "<br>";
echo $gender;
echo "<br>";
echo $admin;
echo "<br>";
echo $message;
?>


</body>
</html>