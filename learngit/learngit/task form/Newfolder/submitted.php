<!doctype html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>

</head>
<body>

<?php

$name=$email=$pwd=$cpwd=$country=$birthday=$gender=$admin=$message="";

	$name = $_POST["name"];
	$email = $_POST["email"];
	$pwd = $_POST["pwd"];
	$cpwd = $_POST["cpwd"];
	$country = $_POST["country"];
	$birthday = $_POST["birthday"];
	$gender = $_POST["gender"];
	$admin = $_POST["admin"];
	if (empty($_POST["message"])){
		$message="";
	} else {
		$message = test_input($_POST["message"]);
	}
			

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

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

