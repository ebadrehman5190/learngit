
<?php
include('session.php');
?>

<!doctype html>
<html>
<head>

</head>
<body>
<form action='#' method="post">
<?php
		
		$conn = mysqli_connect('localhost','root','','test');
		mysqli_select_db($conn,"test");

		$query = "SELECT userid,user,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm";
		
			
		$result = mysqli_query($conn,$query);
		
		echo '<table border="2">';
		echo '<tr>';
		echo '<th>DELETE</th>';
		echo '<th>Userid</th>';
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
		echo '</tr>';
		while($row = mysqli_fetch_array($result)){
		echo '<tr>';
		?>
		<td><input name="checkbox[]" type="checkbox" value="<?php echo $row['userid']; ?>" /></td>
		<?php
		echo '<td>' . $row['userid'] . '</td>';
		echo '<td>' . $row['user'] . '</td>';
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
		<td><input type="button" value="edit" onclick="window.location='Validation.php?id=<?php echo $row['user']; ?>'" ></td>
		<?php
		echo '</tr>';
		}
		echo '</table>';
		?>
		<br>
		<input name="delete" type="submit" id="delete" value="Delete">
		<br><br>
		<input name="logout" type="button" id="logout" value="logout" onclick="window.location='logout.php'" >
		</form>
		
	<?php
	
	
	$later="";
	
	
	if(isset($_POST['delete'])){
		
		foreach($_POST['checkbox'] as $key => $val){
		//echo $val;
		//echo '<br>';
		$del = "DELETE FROM SignUpForm WHERE userid=" . $val;
		$later = mysqli_query($conn,$del);
	}
		//print_r($_POST['checkbox']);
		/*die('here');
		for($i=0;$i<$count;$i++){
		$del_id = $checkbox[$i];
		$del = "DELETE FROM SignUpForm WHERE user='$del_id'";
		$later = mysqli_query($conn,$del);*/
			
			
		}
		
	if($later){
		header('Location: forget.php');
	}
		
		
	//echo implode ("",$row) ;
	
	//<input name="checkbox[]" type="checkbox" id="checkbox[]" value="<? echo $rows['id']; "></td>
	
		//print_r($row);
		//echo $row[0];
		//echo '<br>';
		//echo $row[1];
						
		$conn->close();

		
?>
</body>
</html>