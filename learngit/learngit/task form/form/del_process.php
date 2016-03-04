<?php


$conn = mysqli_connect('localhost','root','','test');
		mysqli_select_db($conn,"test");

		//echo "DELETE userid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE userid='". $_GET['id'] ."' ";
		//die;
		$delete = "DELETE FROM SignUpForm WHERE userid='". $_GET['id'] ."' ";
		if (mysqli_query($conn,$delete) or(die(mysqli_error($conn)))){
			header('Location: forget.php');
			}
			
			?>
		
		