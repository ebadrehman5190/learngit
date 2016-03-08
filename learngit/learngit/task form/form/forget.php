<!doctype html>
<html>
<head>

</head>
<body>
<?php
		
		$conn = mysqli_connect('localhost','root','','test');
		mysqli_select_db($conn,"test");

		$query = "SELECT userid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm";
		$delete = "DELETE userid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE userid=userid";
		
		$result = mysqli_query($conn,$query);
		$del = mysqli_query($conn,$delete);
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
		echo '<th>EditData</th>';
		echo '<th>DeleteData</th>';
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
			?>	
		<td><input type="button" value="edit" onclick="window.location='Validation.php?id=<?php echo $row['userid']; ?>'" ></td>
		<td><input type="button" value="del" onclick="window.location='del_process.php?id=<?php echo $row['userid']; ?>'" ></td>
		<?php
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