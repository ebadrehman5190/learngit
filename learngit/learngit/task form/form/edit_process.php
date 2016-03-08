<?php


$conn = mysqli_connect('localhost','root','','test');
		mysqli_select_db($conn,"test");

		//echo "DELETE userid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE userid='". $_GET['id'] ."' ";
		//die;
		$edit = "SELECT userid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE userid='". $_GET['id'] ."' ";
		(mysqli_query($conn,$edit) or(die(mysqli_error($conn))))
		//{header('Location: Validation.php');}
			
			?>
		
		