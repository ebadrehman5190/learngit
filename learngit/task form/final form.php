<!doctype html>
<html>
<head><title>Sign up form</title></head>
<body>

<form name="myform" action="final form submitted.php" method="post">
	<fieldset>
	<legend><h1>Sign Up Form</h1></legend>
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name"></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email"></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="pwd"></td>
			</tr>
			<tr>
				<td>Confirm password:</td>
				<td><input type="text" name="cpwd"></td>
			</tr>
			<tr>
				<td>Country:</td>
				<td>
					<select name="country">
						<option value=""></option>
						<option value="Australia">Australia</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="India">India</option>
						<option value="Pakistan">Pakistan</option>
						<option value="U.S.A">U.S.A</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" value="Male" checked>Male
					<input type="radio" name="gender" value="Female">Female
				</td>
			</tr>
			<tr>
				<td>Admin type:</td>
				<td><input type="checkbox" name="admin" value="Admin">Admin
					<input type="checkbox" name="admin" value="CoAdmin">CoAdmin
					<input type="checkbox" name="admin" value="User" checked>User</td>
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