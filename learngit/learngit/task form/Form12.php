<!doctype html>
<html>
<head>

<title>
Sign up form
</title>

<style>
.error {color #FF0000;}
</style>

</head>
<body>
<script type="text/javascript">
function revalidate()
{
	if(document.SignUpform.name.value=""){
		document.getElementById("sname").innerHTML="name should not be empty";
		SignUpform.name.focus();
		return(false);
	}else{
		return(true);
	}
}
</script>

<form name="SignUpform" action="" method="POST" onsubmit="return(revalidate())">
	<fieldset>
	<legend><h1>Sign Up Form</h1></legend>
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" id="name"></td>
				<td><font color='red'> <DIV id="sname"> </DIV> </font></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" id="email"></td>
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
				<td><input type="submit" value="submit" onclick="myFunction()"><td>
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