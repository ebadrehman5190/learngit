<?php
session_start();

	$error = "";

	if(isset($_POST['login'])){
		//die('here');
		if(empty($_POST['user']) || empty($_POST['pwd'])){
			//die('gwvf');
			$error = "Username or Password is empety";
		}else{
			//die('j');
			$user = $_POST['user'];
			$pwd = $_POST['pwd'];

				$conn = mysqli_connect('localhost','root','','test');
				mysqli_select_db($conn,"test");

											
					$login=("SELECT * FROM SignUpForm WHERE user='$user'AND Password='$pwd' ");
					$check = mysqli_query($conn,$login);
					$rows = mysqli_num_rows($check);
					
					//echo "SELECT * FROM signupform WHERE user='$user' AND Password='$pwd' "	;			
					//die;
					
					if ($rows == 1){
						$_SESSION['login_user']=$user;
						header("location:forget.php");
					}else{
						$error="Username and Password is invalid";
					}
					
					
			$conn->close();
		}
}



//print_r($_SESSION);

?>