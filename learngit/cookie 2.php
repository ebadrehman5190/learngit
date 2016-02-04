<!doctype html>
<?php
setcookie("user","",time() - 3600 ,'/');
?>
<html>
<body>

<?php
	echo "cookies are enabled.";
	echo "cookie '" . $cookie_name . "' is set!";
?>

</body>
</html>