<?php
session_start();
?>

<!doctype html>
<html>
<body>

<?php
//set session variables
$_SESSION["favcolor"] = "green";
echo "session variables are set"; 
?>

</body>
</html>