<!doctype html>
<html>
<body>
<?php
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
			$message = ($_POST["message"]);
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

