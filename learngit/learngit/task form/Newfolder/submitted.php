<!doctype html>
<html>
<body>

<?php
$name = test_input($_POST["name"]);
$email = test_input($_POST["email"]);
$pwd = test_input($_POST["pwd"]);
$cpwd = test_input($_POST["cpwd"]);
$country = test_input($_POST["country"]);
$birthday = test_input($_POST["birthday"]);
$gender = test_input($_POST["gender"]);
$admin = test_input($_POST["admin"]);
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

