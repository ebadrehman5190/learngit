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

<form name="SignUpform" action="" method="POST" onsubmit="return revalidate()">
	<fieldset>
	<legend><h1>Sign Up Form</h1></legend>
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" name="name" id="name" ></td>
				<td><span id="val_name" style="color:red;"></span></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" id="email"></td>
				<td><span id="val_email" style="color:red;"></span></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="text" name="pwd" id="pwd"></td>
				<td><span id="var_pwd" style="color:red;"></span></td>
			</tr>
			<tr>
				<td>Confirm password:</td>
				<td><input type="text" name="cpwd" id="cpwd"></td>
				<td><span id="var_cpwd" style="color:red;"></span></td>
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
				<td><span id="var_country" style="color:red;"></span></td>	
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" id="gender" value="Male" >Male
					<input type="radio" name="gender" id="gender" value="Female">Female</td>
				<td><span id="var_gender" style="color:red;"></span></td>	
			</tr>
			<tr>
				<td>Admin type:</td>
				<td><input type="checkbox" name="admin" value="Admin">Admin
					<input type="checkbox" name="admin" value="CoAdmin">CoAdmin
					<input type="checkbox" name="admin" value="User" >User</td>
			</tr>
			<tr>
				<td>Message:</td>
				<td><textarea name="message" rows="5" cols="40"></textarea><td>
			</tr>
			<tr>
				<td><input type="submit" value="submit" onclick="revalidate()"><td>
			</tr>
		</table>
	</fieldset>	
</form>

<script type="text/javascript">
function revalidate()
{
		//alert(document.getElementById("name").value);
		if(document.getElementById("name").value == ""){
			//alert(document.getElementById("name"));
			document.getElementById("val_name").innerHTML="Name must be required";
		}
		if(document.getElementById("email").value == ""){
			document.getElementById("val_email").innerHTML="email must be required";
		}
		if( document.getElementById("pwd").value.length < 8){
			document.getElementById("var_pwd").innerHTML="password must be 8 characters";
		}
		if(document.getElementById("cpwd").value == ""){
			document.getElementById("var_cpwd").innerHTML="password must be same";
		}
		if(document.getElementById("pwd").value != document.getElementById("cpwd").value){
			document.getElementById("var_cpwd").innerHTML="password must be same ";
		}
		if(document.getElementById("country").value == ""){
			document.getElementById("var_country").innerHTML="country must be required";
		}
		if(document.getElementById("gender").value == ""){
			document.getElementById("var_gender").innerHTML="gender must be required";
		}
		return(false);
		
		
</script>

</body>
</html>