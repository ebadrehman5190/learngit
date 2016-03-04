<!doctype html>
<html>
<head>

</head>
<body>
<?php
		
		$conn = mysqli_connect('localhost','root','','test');
		mysqli_select_db($conn,"test");

		$query = "SELECT userid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm";
		
		$result = mysqli_query($conn,$query);
		echo '<table border="2">';
		echo '<tr>';
		echo '<th>Username</th>';
		echo '<th>Fullname</th>';
		echo '<th>Email</th>';
		echo '<th>Password</th>';
		echo '<th>ConfirmPassword</th>';
		echo '<th>Country</th>';
		echo '<th>Birthday</th>';
		echo '<th>Gender</th>';
		echo '<th>Admin</th>';
		echo '<th>Message</th>';
		echo '</tr>';
		while($row = mysqli_fetch_array($result)){
		echo '<tr>';
		echo '<td>' . $row['userid'] . '</td>';
		echo '<td>' . $row['Name'] . '</td>';
		echo '<td>' . $row['Email'] . '</td>';
		echo '<td>' . $row['Password'] . '</td>';
		echo '<td>' . $row['ConfirmPassword'] . '</td>';
		echo '<td>' . $row['Country'] . '</td>';
		echo '<td>' . $row['Birthday'] . '</td>';
		echo '<td>' . $row['Gender'] . '</td>';
		echo '<td>' . $row['Admin'] . '</td>';
		echo '<td>' . $row['Message'] . '</td>';
		echo '<td> <input type="submit" value="edit" onclick="EditProfile.php"> </td>';
		echo '<td> <input type="submit" value="delete" > </td>';
		echo '</tr>';
		}
		echo '</table>';
	
	//echo implode ("",$row) ;
	
	
	
		//print_r($row);
		//echo $row[0];
		//echo '<br>';
		//echo $row[1];
						
		$conn->close();

		
?>
</body>
</html>