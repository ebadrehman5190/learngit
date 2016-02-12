<?php
session_start();
?>

<!doctype html>
<html>
<body>

<?php
echo "favourite color " . $_SESSION["favcolor"] . ".<br>";
?>

</body>
</html>