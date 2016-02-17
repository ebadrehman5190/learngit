<!doctype html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>

</head>
<body>

<?php

$nameErr=$emailErr=$pwdErr=$cpwdErr=$confirmpwdErr=$countryErr=$birthdayErr=$genderErr=$AdminErr="";
$name=$email=$pwd=$cpwd=$country=$birthday=$gender=$admin=$message="";


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
			$cpwdErr="confirm password is required";
		}elseif ($_POST["pwd"] != $_POST["cpwd"]){
			$cpwdErr="password should be same";
		}  else {
			$cpwd = test_input($_POST["cpwd"]);
		}
		
		if (empty($_POST["country"])){
			$countryErr="country is required";
		} else {
			$country = test_input($_POST["country"]);
		}
		
		if (empty($_POST["birthday"])){
			$birthdayErr="birthday is required";	
		} else {
			$birthday = test_input($_POST["birthday"]);
		}
		
		if (empty($_POST["gender"])){
			$genderErr="gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}
		
		if (empty($_POST["admin"])){
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

<span class="error"><?php echo $nameErr;?></span>
<br>
<span class="error"><?php echo $emailErr;?></span>
<br>
<span class="error"><?php echo $pwdErr;?></span>
<br>
<span class="error"><?php echo $cpwdErr;?></span>
<br>
<span class="error"><?php echo $countryErr;?></span>
<br>
<span class="error"><?php echo $birthdayErr;?></span>
<br>
<span class="error"><?php echo $genderErr;?></span>
<br>
<span class="error"><?php echo $AdminErr;?></span>
<br>
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
echo $birthday;
echo "<br>";
echo $gender;
echo "<br>";
echo $admin;
echo "<br>";
echo $message;
?>




</body>
</html>

