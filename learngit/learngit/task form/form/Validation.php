<?php

$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				//$select = mysqli_select_db('test');
				mysqli_select_db($conn,"test");
				
				$edit = "SELECT user,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE user='". $_GET['id'] ."' ";

				$record = mysqli_query($conn,$edit);
				$data = mysqli_fetch_array($record);
				
			if (isset($data)){
				//echo "SELECT u	serid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE user='". $_GET['id'] ."' " ;
			}
?>
<!doctype html>
<html>
<head>

<title>
Sign up form
</title>

<style>
	.error {color: #FF0000;}


	.form_title{
	 font-size:20px;
	 color:#141823;
	 text-align:center;
	 padding:10px;
	 font-weight:normal;
	 }
	 
	 .field_set{	 
	 border:solid;
	 width:800px;
	 height:850px;
	 text-align:center;
	 margin-left:180px; 
	 }
</style>	 
</head>
<body>

<script type="text/javascript">
function revalidate()
{
	
	var validate= true;
	var str=document.getElementById("email").value;
	var alpha=document.getElementById("fullname").value;
	var letters = /^[A-Za-z]+$/;  
	var filter=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
			if(document.getElementById("user").value == ""){
				document.getElementById("var_user").innerHTML="please enter the username";
				validate = false;
			}else{
				document.getElementById("var_user").innerHTML="";
			}
			
			
			if(document.getElementById("fullname").value == ""){
				document.getElementById("var_fullname").innerHTML="please enter the name";
				validate = false;
			}else if (!letters.test(alpha)){
				document.getElementById("var_fullname").innerHTML="Name must contain only alphabets";
				validate = false;			
			}else{
				document.getElementById("var_fullname").innerHTML="";
			}
			
			
			if(document.getElementById("email").value == ""){
				document.getElementById("var_email").innerHTML="please enter the email";
				validate = false;
			}else if (!filter.test(str)){
				document.getElementById("var_email").innerHTML="Email must be in proper format";
				validate = false;			
			}else{
				document.getElementById("var_email").innerHTML="";
			}
			
			
			if( document.getElementById("pwd").value == ""){
				document.getElementById("var_pwd").innerHTML="please enter the Password";
				validate = false;
			}else if( document.getElementById("pwd").value.length < 8){
				document.getElementById("var_pwd").innerHTML="Password must be 8 characters";
				validate = false;
			}else{
				document.getElementById("var_pwd").innerHTML="";
			}
			
			
			if(document.getElementById("cpwd").value == ""){
				document.getElementById("var_cpwd").innerHTML="please enter the Confirm Password";
				validate = false;
			}else if(document.getElementById("pwd").value != document.getElementById("cpwd").value){
				document.getElementById("var_cpwd").innerHTML="Password must be same";
				validate = false;
			}else{
				document.getElementById("var_cpwd").innerHTML="";
			}
			
				
			if(document.getElementById("country").value == ""){
				document.getElementById("var_country").innerHTML="Country must be required";
				validate = false;
			}else{
				document.getElementById("var_country").innerHTML="";
			}
			
			
			if(document.getElementById("birthday1").value == ""){
				document.getElementById("var_birthday").innerHTML="Date of birth must be required";
				validate = false;
			}else{
				document.getElementById("var_birthday").innerHTML="";
			}
			
			
			if(document.getElementById("birthday2").value == ""){
				document.getElementById("var_birthday").innerHTML="Date of birth must be required";
				validate = false;
			}else{
				document.getElementById("var_birthday").innerHTML="";
			}


			if(document.getElementById("birthday3").value == ""){
				document.getElementById("var_birthday").innerHTML="Date of birth must be required";
				validate = false;
			}else{
				document.getElementById("var_birthday").innerHTML="";
			}
			
			
			if(document.getElementById("gender").checked == false && document.getElementById("gender1").checked == false){
				document.getElementById("var_gender").innerHTML="Gender must be required";
				validate = false;
			}else{
				document.getElementById("var_gender").innerHTML="";
			}


			if(document.getElementById("admin").checked == false && document.getElementById("admin1").checked == false && document.getElementById("admin2").checked == false){
				document.getElementById("var_admin").innerHTML="Admin type must be required";
				validate = false;
			}else{
				document.getElementById("var_admin").innerHTML="";
			}


			
			if(validate == false){
				return(false);
			}else{
				return(true);
			}
}		
		
</script>

<?php

$userErr=$fullnameErr=$emailErr=$pwdErr=$cpwdErr=$confirmpwdErr=$countryErr=$birthdayErr=$genderErr=$AdminErr="";
$user=$fullname=$email=$pwd=$cpwd=$country=$birthday=$gender=$admin=$message="";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["user"])){
			$userErr="user name is required";
		} else {
			$user = test_input($_POST["user"]);
		}
		
		if (empty($_POST["fullname"])){
			$fullnameErr="name is required";
		} else {
			$fullname = test_input($_POST["fullname"]);
		}
		
		 
		
		if (empty($_POST["email"])){
			$emailErr="email is required";
		} else {
			$email = test_input($_POST["email"]);
		}
		
		if (empty($_POST["pwd"])){
			$pwdErr="password is required";
		} else {
			$pwd = test_input($_POST["pwd"]);
		}
		
		if (empty($_POST["cpwd"])){
			$cpwdErr="confirm password is required";
		}elseif ($_POST["pwd"] != $_POST["cpwd"]){
			$cpwdErr="password should be same";
		}  else {
			$cpwd = test_input($_POST["cpwd"]);
		}
		
		if (empty($_POST["country"])){
			$countryErr="country is required";
		} else {
			$country = test_input($_POST["country"]);
		}
		
		if (empty($_POST["birthday"])){
			$birthdayErr="birthday is required";	
		} else {
			$birthday = test_input($_POST["birthday"]);
		}
		
		if (empty($_POST["gender"])){
			$genderErr="gender is required";
		} else {
			$gender = test_input($_POST["gender"]);
		}
		
		if (empty($_POST["admin"])){
			$AdminErr="admin is required";
		} else {
			$admin = test_input($_POST["admin"]);
		}

		if (empty($_POST["message"])){
			$message="";
		} else {
			$message = test_input($_POST["message"]);
		}
			
	}
function test_input($data) {
	
}

?>
<form name="Registration" class="form_title" action="" method="POST" onSubmit="return revalidate()">
	<fieldset class="field_set" src="SMWpCenterPinch.png">
	<legend><h1>Registration</h1></legend>
		<table>
			<tr>
				<td>UserName:</td>
				<td><input type="text" name="user" id="user" value="<?php if(isset($data['user'])){ echo $data['user']; } ?>"></td>
				<td><span id="var_user" style="color:red;"><?php echo $userErr;?></span></td>
			</tr>
			<tr>
				<td>FullName:</td>
				<td><input type="text" name="fullname" id="fullname" value="<?php if(isset($data['Name'])){ echo $data['Name']; } ?>" ></td>
				<td><span id="var_fullname" style="color:red;"><?php echo $fullnameErr;?></span></td>
			</tr>
			<tr>
				<td>Email:</td>
				<td><input type="text" name="email" id="email" value="<?php if(isset($data['Email'])){ echo $data['Email']; } ?>" ></td>
				<td><span id="var_email" style="color:red;"><?php echo $emailErr;?></span></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="pwd" id="pwd"></td>
				<td><span id="var_pwd" style="color:red;"><?php echo $pwdErr;?></span></td>
			</tr>
			<tr>
				<td>Confirm password:</td>
				<td><input type="password" name="cpwd" id="cpwd"></td>
				<td><span id="var_cpwd" style="color:red;"><?php echo $cpwdErr;?></span></td>
			</tr>
			<tr>
				<td>Country:</td>
				<td>
					<select name="country" id="country" selected="<?php if(isset($data['Country'])){ echo $data['Country']; } ?>">
						<option value="" <?php if($data['Country']== "") echo "selected"; ?>>Select country</option>
						<option value="United States of America" <?php if($data['Country']== "United States of America") echo "selected"; ?>>United States of America</option>
						<option value="United Kingdom" <?php if($data['Country']== "United Kingdom") echo "selected"; ?>>United Kingdom</option>
						<option value="Australia" <?php if($data['Country']== "Australia") echo "selected"; ?>>Australia</option>
						<option value="Canada" <?php if($data['Country']== "Canada") echo "selected"; ?>>Canada</option>
						<option value="Afghanistan" <?php if($data['Country']== "Afghanistan") echo "selected"; ?>>Afghanistan</option>
						<option value="Albania" <?php if($data['Country']== "Albania") echo "selected"; ?>>Albania</option>
						<option value="Algeria" <?php if($data['Country']== "Algeria") echo "selected"; ?>>Algeria</option>
						<option value="American Samoa" <?php if($data['Country']== "American Samoa") echo "selected"; ?>>American Samoa</option>
						<option value="Andorra" <?php if($data['Country']== "Andorra") echo "selected"; ?>>Andorra</option>
						<option value="Angola" <?php if($data['Country']== "Angola") echo "selected"; ?>>Angola</option>
						<option value="Anguilla" <?php if($data['Country']== "Anguilla") echo "selected"; ?>>Anguilla</option>
						<option value="Antigua &amp; Barbuda" <?php if($data['Country']== "Antigua &amp; Barbuda") echo "selected"; ?>>Antigua &amp; Barbuda</option>
						<option value="Argentina" <?php if($data['Country']== "Argentina") echo "selected"; ?>>Argentina</option>
						<option value="Armenia" <?php if($data['Country']== "Armenia") echo "selected"; ?>>Armenia</option>
						<option value="Aruba" <?php if($data['Country']== "Aruba") echo "selected"; ?>>Aruba</option>
						<option value="Australia" <?php if($data['Country']== "Australia") echo "selected"; ?>>Australia</option>
						<option value="Austria" <?php if($data['Country']== "Austria") echo "selected"; ?>>Austria</option>
						<option value="Azerbaijan" <?php if($data['Country']== "Azerbaijan") echo "selected"; ?>>Azerbaijan</option>
						<option value="Azores" <?php if($data['Country']== "Azores") echo "selected"; ?>>Azores</option>
						<option value="Bahamas" <?php if($data['Country']== "Bahamas") echo "selected"; ?>>Bahamas</option>
						<option value="Bahrain" <?php if($data['Country']== "Bahrain") echo "selected"; ?>>Bahrain</option>
						<option value="Bangladesh" <?php if($data['Country']== "Bangladesh") echo "selected"; ?>>Bangladesh</option>
						<option value="Barbados" <?php if($data['Country']== "Barbados") echo "selected"; ?>>Barbados</option>
						<option value="Belarus" <?php if($data['Country']== "Belarus") echo "selected"; ?>>Belarus</option>
						<option value="Belgium" <?php if($data['Country']== "Belgium") echo "selected"; ?>>Belgium</option>
						<option value="Belize" <?php if($data['Country']== "Belize") echo "selected"; ?>>Belize</option>
						<option value="Benin" <?php if($data['Country']== "Benin") echo "selected"; ?>>Benin</option>
						<option value="Bermuda" <?php if($data['Country']== "Bermuda") echo "selected"; ?>>Bermuda</option>
						<option value="Bhutan" <?php if($data['Country']== "Bhutan") echo "selected"; ?>>Bhutan</option>
						<option value="Bolivia" <?php if($data['Country']== "Bolivia") echo "selected"; ?>>Bolivia</option>
						<option value="Bonaire" <?php if($data['Country']== "Bonaire") echo "selected"; ?>>Bonaire</option>
						<option value="Bosnia &amp; Herzegovina" <?php if($data['Country']== "Bosnia &amp; Herzegovina") echo "selected"; ?>>Bosnia &amp; Herzegovina</option>
						<option value="Botswana" <?php if($data['Country']== "Botswana") echo "selected"; ?>>Botswana</option>
						<option value="Brazil" <?php if($data['Country']== "Brazil") echo "selected"; ?>>Brazil</option>
						<option value="British Indian Ocean Ter" <?php if($data['Country']== "British Indian Ocean Ter") echo "selected"; ?>>British Indian Ocean Ter</option>
						<option value="Brunei" <?php if($data['Country']== "Brunei") echo "selected"; ?>>Brunei</option>
						<option value="Bulgaria" <?php if($data['Country']== "Bulgaria") echo "selected"; ?>>Bulgaria</option>
						<option value="Burkina Faso" <?php if($data['Country']== "Burkina Faso") echo "selected"; ?>>Burkina Faso</option>
						<option value="Burundi" <?php if($data['Country']== "Burundi") echo "selected"; ?>>Burundi</option>
						<option value="Cambodia" <?php if($data['Country']== "Cambodia") echo "selected"; ?>>Cambodia</option>
						<option value="Cameroon" <?php if($data['Country']== "Cameroon") echo "selected"; ?>>Cameroon</option>
						<option value="Canada" <?php if($data['Country']== "Canada") echo "selected"; ?>>Canada</option>
						<option value="Canary Islands" <?php if($data['Country']== "Canary Islands") echo "selected"; ?>>Canary Islands</option>
						<option value="Cape Verde" <?php if($data['Country']== "Cape Verde") echo "selected"; ?>>Cape Verde</option>
						<option value="Cayman Islands" <?php if($data['Country']== "Cayman Islands") echo "selected"; ?>>Cayman Islands</option>
						<option value="Central African Republic" <?php if($data['Country']== "Central African Republic") echo "selected"; ?>>Central African Republic</option>
						<option value="Chad" <?php if($data['Country']== "Chad") echo "selected"; ?>>Chad</option>
						<option value="Channel Islands" <?php if($data['Country']== "Channel Islands") echo "selected"; ?>>Channel Islands</option>
						<option value="Chile" <?php if($data['Country']== "Chile") echo "selected"; ?>>Chile</option>
						<option value="China" <?php if($data['Country']== "China") echo "selected"; ?>>China</option>
						<option value="Christmas Island" <?php if($data['Country']== "Christmas Island") echo "selected"; ?>>Christmas Island</option>
						<option value="Cocos Island" <?php if($data['Country']== "Cocos Island") echo "selected"; ?>>Cocos Island</option>
						<option value="Colombia" <?php if($data['Country']== "Colombia") echo "selected"; ?>>Colombia</option>
						<option value="Comoros" <?php if($data['Country']== "Comoros") echo "selected"; ?>>Comoros</option>
						<option value="Congo" <?php if($data['Country']== "Congo") echo "selected"; ?>>Congo</option>
						<option value="Congo Democratic Rep" <?php if($data['Country']== "Congo Democratic Rep") echo "selected"; ?>>Congo Democratic Rep</option>
						<option value="Cook Islands" <?php if($data['Country']== "Cook Islands") echo "selected"; ?>>Cook Islands</option>
						<option value="Costa Rica" <?php if($data['Country']== "Costa Rica") echo "selected"; ?>>Costa Rica</option>
						<option value="Cote DIvoire" <?php if($data['Country']== "Cote DIvoire") echo "selected"; ?>>Cote D'Ivoire</option>
						<option value="Croatia" <?php if($data['Country']== "Croatia") echo "selected"; ?>>Croatia</option>
						<option value="Cuba" <?php if($data['Country']== "Cuba") echo "selected"; ?>>Cuba</option>
						<option value="Curacao" <?php if($data['Country']== "Curacao") echo "selected"; ?>>Curacao</option>
						<option value="Cyprus" <?php if($data['Country']== "Cyprus") echo "selected"; ?>>Cyprus</option>
						<option value="Czech Republic" <?php if($data['Country']== "Czech Republic") echo "selected"; ?>>Czech Republic</option>
						<option value="Denmark" <?php if($data['Country']== "Denmark") echo "selected"; ?>>Denmark</option>
						<option value="Djibouti" <?php if($data['Country']== "Djibouti") echo "selected"; ?>>Djibouti</option>
						<option value="Dominica" <?php if($data['Country']== "Dominica") echo "selected"; ?>>Dominica</option>
						<option value="Dominican Republic" <?php if($data['Country']== "Dominican Republic") echo "selected"; ?>>Dominican Republic</option>
						<option value="East Timor" <?php if($data['Country']== "East Timor") echo "selected"; ?>>East Timor</option>
						<option value="Ecuador" <?php if($data['Country']== "Ecuador") echo "selected"; ?>>Ecuador</option>
						<option value="Egypt" <?php if($data['Country']== "Egypt") echo "selected"; ?>>Egypt</option>
						<option value="El Salvador" <?php if($data['Country']== "El Salvador") echo "selected"; ?>>El Salvador</option>
						<option value="Equatorial Guinea" <?php if($data['Country']== "Equatorial Guinea") echo "selected"; ?>>Equatorial Guinea</option>
						<option value="Eritrea" <?php if($data['Country']== "Eritrea") echo "selected"; ?>>Eritrea</option>
						<option value="Estonia" <?php if($data['Country']== "Estonia") echo "selected"; ?>>Estonia</option>
						<option value="Ethiopia" <?php if($data['Country']== "Ethiopia") echo "selected"; ?>>Ethiopia</option>
						<option value="Falkland Islands" <?php if($data['Country']== "Falkland Islands") echo "selected"; ?>>Falkland Islands</option>
						<option value="Faroe Islands" <?php if($data['Country']== "Faroe Islands") echo "selected"; ?>>Faroe Islands</option>
						<option value="Fiji" <?php if($data['Country']== "Fiji") echo "selected"; ?>>Fiji</option>
						<option value="Finland" <?php if($data['Country']== "Finland") echo "selected"; ?>>Finland</option>
						<option value="France" <?php if($data['Country']== "France") echo "selected"; ?>>France</option>
						<option value="French Guiana" <?php if($data['Country']== "French Guiana") echo "selected"; ?>>French Guiana</option>
						<option value="French Polynesia" <?php if($data['Country']== "French Polynesia") echo "selected"; ?>>French Polynesia</option>
						<option value="French Southern Ter" <?php if($data['Country']== "French Southern Ter") echo "selected"; ?>>French Southern Ter</option>
						<option value="Gabon" <?php if($data['Country']== "Gabon") echo "selected"; ?>>Gabon</option>
						<option value="Gambia" <?php if($data['Country']== "Gambia") echo "selected"; ?>>Gambia</option>
						<option value="Georgia" <?php if($data['Country']== "Georgia") echo "selected"; ?>>Georgia</option>
						<option value="Germany" <?php if($data['Country']== "Germany") echo "selected"; ?>>Germany</option>
						<option value="Ghana" <?php if($data['Country']== "Ghana") echo "selected"; ?>>Ghana</option>
						<option value="Gibraltar" <?php if($data['Country']== "Gibraltar") echo "selected"; ?>>Gibraltar</option>
						<option value="Great Britain" <?php if($data['Country']== "Great Britain") echo "selected"; ?>>Great Britain</option>
						<option value="Greece" <?php if($data['Country']== "Greece") echo "selected"; ?>>Greece</option>
						<option value="Greenland" <?php if($data['Country']== "Greenland") echo "selected"; ?>>Greenland</option>
						<option value="Grenada" <?php if($data['Country']== "Grenada") echo "selected"; ?>>Grenada</option>
						<option value="Guadeloupe" <?php if($data['Country']== "Guadeloupe") echo "selected"; ?>>Guadeloupe</option>
						<option value="Guam" <?php if($data['Country']== "Guam") echo "selected"; ?>>Guam</option>
						<option value="Guatemala" <?php if($data['Country']== "Guatemala") echo "selected"; ?>>Guatemala</option>
						<option value="Guernsey" <?php if($data['Country']== "Guernsey") echo "selected"; ?>>Guernsey</option>
						<option value="Guinea" <?php if($data['Country']== "Guinea") echo "selected"; ?>>Guinea</option>
						<option value="Guinea-Bissau" <?php if($data['Country']== "Guinea-Bissau") echo "selected"; ?>>Guinea-Bissau</option>
						<option value="Guyana" <?php if($data['Country']== "Guyana") echo "selected"; ?>>Guyana</option>
						<option value="Haiti" <?php if($data['Country']== "Haiti") echo "selected"; ?>>Haiti</option>
						<option value="Honduras" <?php if($data['Country']== "Honduras") echo "selected"; ?>>Honduras</option>
						<option value="Hong Kong" <?php if($data['Country']== "Hong Kong") echo "selected"; ?>>Hong Kong</option>
						<option value="Hungary" <?php if($data['Country']== "Hungary") echo "selected"; ?>>Hungary</option>
						<option value="Iceland" <?php if($data['Country']== "Iceland") echo "selected"; ?>>Iceland</option>
						<option value="India" <?php if($data['Country']== "India") echo "selected"; ?>>India</option>
						<option value="Indonesia" <?php if($data['Country']== "Indonesia") echo "selected"; ?>>Indonesia</option>
						<option value="Iran" <?php if($data['Country']== "Iran") echo "selected"; ?>>Iran</option>
						<option value="Iraq" <?php if($data['Country']== "Iraq") echo "selected"; ?>>Iraq</option>
						<option value="Ireland" <?php if($data['Country']== "Ireland") echo "selected"; ?>>Ireland</option>
						<option value="Isle of Man" <?php if($data['Country']== "Isle of Man") echo "selected"; ?>>Isle of Man</option>
						<option value="Israel" <?php if($data['Country']== "Israel") echo "selected"; ?>>Israel</option>
						<option value="Italy" <?php if($data['Country']== "Italy") echo "selected"; ?>>Italy</option>
						<option value="Jamaica" <?php if($data['Country']== "Jamaica") echo "selected"; ?>>Jamaica</option>
						<option value="Japan" <?php if($data['Country']== "Japan") echo "selected"; ?>>Japan</option>
						<option value="Jersey" <?php if($data['Country']== "Jersey") echo "selected"; ?>>Jersey</option>
						<option value="Jordan" <?php if($data['Country']== "Jordan") echo "selected"; ?>>Jordan</option>
						<option value="Kazakhstan" <?php if($data['Country']== "Kazakhstan") echo "selected"; ?>>Kazakhstan</option>
						<option value="Kenya" <?php if($data['Country']== "Kenya") echo "selected"; ?>>Kenya</option>
						<option value="Kiribati" <?php if($data['Country']== "Kiribati") echo "selected"; ?>>Kiribati</option>
						<option value="Korea North" <?php if($data['Country']== "Korea North") echo "selected"; ?>>Korea North</option>
						<option value="Korea South" <?php if($data['Country']== "Korea South") echo "selected"; ?>>Korea South</option>
						<option value="Kuwait" <?php if($data['Country']== "Kuwait") echo "selected"; ?>>Kuwait</option>
						<option value="Kyrgyzstan" <?php if($data['Country']== "Kyrgyzstan") echo "selected"; ?>>Kyrgyzstan</option>
						<option value="Laos" <?php if($data['Country']== "Laos") echo "selected"; ?>>Laos</option>
						<option value="Latvia" <?php if($data['Country']== "Latvia") echo "selected"; ?>>Latvia</option>
						<option value="Lebanon" <?php if($data['Country']== "Lebanon") echo "selected"; ?>>Lebanon</option>
						<option value="Lesotho" <?php if($data['Country']== "Lesotho") echo "selected"; ?>>Lesotho</option>
						<option value="Liberia" <?php if($data['Country']== "Liberia") echo "selected"; ?>>Liberia</option>
						<option value="Libya" <?php if($data['Country']== "Libya") echo "selected"; ?>>Libya</option>
						<option value="Liechtenstein" <?php if($data['Country']== "Liechtenstein") echo "selected"; ?>>Liechtenstein</option>
						<option value="Lithuania" <?php if($data['Country']== "Lithuania") echo "selected"; ?>>Lithuania</option>
						<option value="Luxembourg" <?php if($data['Country']== "Luxembourg") echo "selected"; ?>>Luxembourg</option>
						<option value="Macau" <?php if($data['Country']== "Macau") echo "selected"; ?>>Macau</option>
						<option value="Macedonia" <?php if($data['Country']== "Macedonia") echo "selected"; ?>>Macedonia</option>
						<option value="Madagascar" <?php if($data['Country']== "Madagascar") echo "selected"; ?>>Madagascar</option>
						<option value="Malawi" <?php if($data['Country']== "Malawi") echo "selected"; ?>>Malawi</option>
						<option value="Malaysia" <?php if($data['Country']== "Malaysia") echo "selected"; ?>>Malaysia</option>
						<option value="Maldives" <?php if($data['Country']== "Maldives") echo "selected"; ?>>Maldives</option>
						<option value="Mali" <?php if($data['Country']== "Mali") echo "selected"; ?>>Mali</option>
						<option value="Malta" <?php if($data['Country']== "Malta") echo "selected"; ?>>Malta</option>
						<option value="Marshall Islands" <?php if($data['Country']== "Marshall Islands") echo "selected"; ?>>Marshall Islands</option>
						<option value="Martinique" <?php if($data['Country']== "Martinique") echo "selected"; ?>>Martinique</option>
						<option value="Mauritania" <?php if($data['Country']== "Mauritania") echo "selected"; ?>>Mauritania</option>
						<option value="Mauritius" <?php if($data['Country']== "Mauritius") echo "selected"; ?>>Mauritius</option>
						<option value="Mayotte" <?php if($data['Country']== "Mayotte") echo "selected"; ?>>Mayotte</option>
						<option value="Mexico" <?php if($data['Country']== "Mexico") echo "selected"; ?>>Mexico</option>
						<option value="Midway Islands" <?php if($data['Country']== "Midway Islands") echo "selected"; ?>>Midway Islands</option>
						<option value="Moldova" <?php if($data['Country']== "Moldova") echo "selected"; ?>>Moldova</option>
						<option value="Monaco" <?php if($data['Country']== "Monaco") echo "selected"; ?>>Monaco</option>
						<option value="Mongolia" <?php if($data['Country']== "Mongolia") echo "selected"; ?>>Mongolia</option>
						<option value="Montenegro" <?php if($data['Country']== "Montenegro") echo "selected"; ?>>Montenegro</option>
						<option value="Montserrat" <?php if($data['Country']== "Montserrat") echo "selected"; ?>>Montserrat</option>
						<option value="Morocco" <?php if($data['Country']== "Morocco") echo "selected"; ?>>Morocco</option>
						<option value="Mozambique" <?php if($data['Country']== "Mozambique") echo "selected"; ?>>Mozambique</option>
						<option value="Myanmar" <?php if($data['Country']== "Myanmar") echo "selected"; ?>>Myanmar</option>
						<option value="Namibia" <?php if($data['Country']== "Namibia") echo "selected"; ?>>Namibia</option>
						<option value="Nauru" <?php if($data['Country']== "Nauru") echo "selected"; ?>>Nauru</option>
						<option value="Nepal" <?php if($data['Country']== "Nepal") echo "selected"; ?>>Nepal</option>
						<option value="Netherland Antilles" <?php if($data['Country']== "Netherland Antilles") echo "selected"; ?>>Netherland Antilles</option>
						<option value="Netherlands" <?php if($data['Country']== "Netherlands") echo "selected"; ?>>Netherlands</option>
						<option value="Nevis" <?php if($data['Country']== "Nevis") echo "selected"; ?>>Nevis</option>
						<option value="New Caledonia" <?php if($data['Country']== "New Caledonia") echo "selected"; ?>>New Caledonia</option>
						<option value="New Zealand" <?php if($data['Country']== "New Zealand") echo "selected"; ?>>New Zealand</option>
						<option value="Nicaragua" <?php if($data['Country']== "Nicaragua") echo "selected"; ?>>Nicaragua</option>
						<option value="Niger" <?php if($data['Country']== "Niger") echo "selected"; ?>>Niger</option>
						<option value="Nigeria" <?php if($data['Country']== "Nigeria") echo "selected"; ?>>Nigeria</option>
						<option value="Niue" <?php if($data['Country']== "Niue") echo "selected"; ?>>Niue</option>
						<option value="Norfolk Island" <?php if($data['Country']== "Norfolk Island") echo "selected"; ?>>Norfolk Island</option>
						<option value="Norway" <?php if($data['Country']== "Norway") echo "selected"; ?>>Norway</option>
						<option value="Oman" <?php if($data['Country']== "Oman") echo "selected"; ?>>Oman</option>
						<option value="Pakistan" <?php if($data['Country']== "Pakistan") echo "selected"; ?>>Pakistan</option>
						<option value="Palau Island" <?php if($data['Country']== "Palau Island") echo "selected"; ?>>Palau Island</option>
						<option value="Palestine" <?php if($data['Country']== "Palestine") echo "selected"; ?>>Palestine</option>
						<option value="Panama" <?php if($data['Country']== "Panama") echo "selected"; ?>>Panama</option>
						<option value="Papua New Guinea" <?php if($data['Country']== "Papua New Guinea") echo "selected"; ?>>Papua New Guinea</option>
						<option value="Paraguay" <?php if($data['Country']== "Paraguay") echo "selected"; ?>>Paraguay</option>
						<option value="Peru" <?php if($data['Country']== "Peru") echo "selected"; ?>>Peru</option>
						<option value="Philippines" <?php if($data['Country']== "Philippines") echo "selected"; ?>>Philippines</option>
						<option value="Pitcairn Island" <?php if($data['Country']== "Pitcairn Island") echo "selected"; ?>>Pitcairn Island</option>
						<option value="Poland" <?php if($data['Country']== "Poland") echo "selected"; ?>>Poland</option>
						<option value="Portugal" <?php if($data['Country']== "Portugal") echo "selected"; ?>>Portugal</option>
						<option value="Puerto Rico" <?php if($data['Country']== "Puerto Rico") echo "selected"; ?>>Puerto Rico</option>
						<option value="Qatar" <?php if($data['Country']== "Qatar") echo "selected"; ?>>Qatar</option>
						<option value="Reunion" <?php if($data['Country']== "Reunion") echo "selected"; ?>>Reunion</option>
						<option value="Romania" <?php if($data['Country']== "Romania") echo "selected"; ?>>Romania</option>
						<option value="Russia" <?php if($data['Country']== "Russia") echo "selected"; ?>>Russia</option>
						<option value="Rwanda" <?php if($data['Country']== "Rwanda") echo "selected"; ?>>Rwanda</option>
						<option value="Saipan" <?php if($data['Country']== "Saipan") echo "selected"; ?>>Saipan</option>
						<option value="Samoa" <?php if($data['Country']== "Samoa") echo "selected"; ?>>Samoa</option>
						<option value="Samoa American" <?php if($data['Country']== "Samoa American") echo "selected"; ?>>Samoa American</option>
						<option value="San Marino" <?php if($data['Country']== "San Marino") echo "selected"; ?>>San Marino</option>
						<option value="Sao Tome &amp; Principe" <?php if($data['Country']== "Sao Tome &amp; Principe") echo "selected"; ?>>Sao Tome &amp; Principe</option>
						<option value="Saudi Arabia" <?php if($data['Country']== "Saudi Arabia") echo "selected"; ?>>Saudi Arabia</option>
						<option value="Senegal" <?php if($data['Country']== "Senegal") echo "selected"; ?>>Senegal</option>
						<option value="Serbia" <?php if($data['Country']== "Serbia") echo "selected"; ?>>Serbia</option>
						<option value="Serbia &amp; Montenegro" <?php if($data['Country']== "Serbia &amp; Montenegro") echo "selected"; ?>>Serbia &amp; Montenegro</option>
						<option value="Seychelles" <?php if($data['Country']== "Seychelles") echo "selected"; ?>>Seychelles</option>
						<option value="Sierra Leone" <?php if($data['Country']== "Sierra Leone") echo "selected"; ?>>Sierra Leone</option>
						<option value="Singapore" <?php if($data['Country']== "Singapore") echo "selected"; ?>>Singapore</option>
						<option value="Slovakia" <?php if($data['Country']== "Slovakia") echo "selected"; ?>>Slovakia</option>
						<option value="Slovenia" <?php if($data['Country']== "Slovenia") echo "selected"; ?>>Slovenia</option>
						<option value="Solomon Islands" <?php if($data['Country']== "Solomon Islands") echo "selected"; ?>>Solomon Islands</option>
						<option value="Somalia" <?php if($data['Country']== "Somalia") echo "selected"; ?>>Somalia</option>
						<option value="South Africa" <?php if($data['Country']== "South Africa") echo "selected"; ?>>South Africa</option>
						<option value="South Sudan" <?php if($data['Country']== "South Sudan") echo "selected"; ?>>South Sudan</option>
						<option value="Spain" <?php if($data['Country']== "Spain") echo "selected"; ?>>Spain</option>
						<option value="Sri Lanka" <?php if($data['Country']== "Sri Lanka") echo "selected"; ?>>Sri Lanka</option>
						<option value="St Barthelemy" <?php if($data['Country']== "St Barthelemy") echo "selected"; ?>>St Barthelemy</option>
						<option value="St Eustatius" <?php if($data['Country']== "St Eustatius") echo "selected"; ?>>St Eustatius</option>
						<option value="St Helena" <?php if($data['Country']== "St Helena") echo "selected"; ?>>St Helena</option>
						<option value="St Kitts-Nevis" <?php if($data['Country']== "St Kitts-Nevis") echo "selected"; ?>>St Kitts-Nevis</option>
						<option value="St Lucia" <?php if($data['Country']== "St Lucia") echo "selected"; ?>>St Lucia</option>
						<option value="St Maarten" <?php if($data['Country']== "St Maarten") echo "selected"; ?>>St Maarten</option>
						<option value="St Pierre &amp; Miquelon" <?php if($data['Country']== "St Pierre &amp; Miquelon") echo "selected"; ?>>St Pierre &amp; Miquelon</option>
						<option value="St Vincent &amp; Grenadines" <?php if($data['Country']== "St Vincent &amp; Grenadines") echo "selected"; ?>>St Vincent &amp; Grenadines</option>
						<option value="Sudan" <?php if($data['Country']== "Sudan") echo "selected"; ?>>Sudan</option>
						<option value="Suriname" <?php if($data['Country']== "Suriname") echo "selected"; ?>>Suriname</option>
						<option value="Swaziland" <?php if($data['Country']== "Swaziland") echo "selected"; ?>>Swaziland</option>
						<option value="Sweden" <?php if($data['Country']== "Sweden") echo "selected"; ?>>Sweden</option>
						<option value="Switzerland" <?php if($data['Country']== "Switzerland") echo "selected"; ?>>Switzerland</option>
						<option value="Syria" <?php if($data['Country']== "Syria") echo "selected"; ?>>Syria</option>
						<option value="Tahiti" <?php if($data['Country']== "Tahiti") echo "selected"; ?>>Tahiti</option>
						<option value="Taiwan" <?php if($data['Country']== "Taiwan") echo "selected"; ?>>Taiwan</option>
						<option value="Tajikistan" <?php if($data['Country']== "Tajikistan") echo "selected"; ?>>Tajikistan</option>
						<option value="Tanzania" <?php if($data['Country']== "Tanzania") echo "selected"; ?>>Tanzania</option>
						<option value="Thailand" <?php if($data['Country']== "Thailand") echo "selected"; ?>>Thailand</option>
						<option value="Togo" <?php if($data['Country']== "Togo") echo "selected"; ?>>Togo</option>
						<option value="Tokelau" <?php if($data['Country']== "Tokelau") echo "selected"; ?>>Tokelau</option>
						<option value="Tonga" <?php if($data['Country']== "Tonga") echo "selected"; ?>>Tonga</option>
						<option value="Trinidad &amp; Tobago" <?php if($data['Country']== "Trinidad &amp; Tobago") echo "selected"; ?>>Trinidad &amp; Tobago</option>
						<option value="Tunisia" <?php if($data['Country']== "Tunisia") echo "selected"; ?>>Tunisia</option>
						<option value="Turkey" <?php if($data['Country']== "Turkey") echo "selected"; ?>>Turkey</option>
						<option value="Turkmenistan" <?php if($data['Country']== "Turkmenistan") echo "selected"; ?>>Turkmenistan</option>
						<option value="Turks &amp; Caicos Is" <?php if($data['Country']== "Turks &amp; Caicos Is") echo "selected"; ?>>Turks &amp; Caicos Is</option>
						<option value="Tuvalu" <?php if($data['Country']== "Tuvalu") echo "selected"; ?>>Tuvalu</option>
						<option value="Uganda" <?php if($data['Country']== "Uganda") echo "selected"; ?>>Uganda</option>
						<option value="Ukraine" <?php if($data['Country']== "Ukraine") echo "selected"; ?>>Ukraine</option>
						<option value="United Arab Emirates" <?php if($data['Country']== "United Arab Emirates") echo "selected"; ?>>United Arab Emirates</option>
						<option value="United Kingdom" <?php if($data['Country']== "United Kingdom") echo "selected"; ?>>United Kingdom</option>
						<option value="United States of America" <?php if($data['Country']== "United States of America") echo "selected"; ?>>United States of America</option>
						<option value="Uruguay" <?php if($data['Country']== "Uruguay") echo "selected"; ?>>Uruguay</option>
						<option value="Uzbekistan" <?php if($data['Country']== "Uzbekistan") echo "selected"; ?>>Uzbekistan</option>
						<option value="Vanuatu" <?php if($data['Country']== "Vanuatu") echo "selected"; ?>>Vanuatu</option>
						<option value="Vatican City State" <?php if($data['Country']== "Vatican City State") echo "selected"; ?>>Vatican City State</option>
						<option value="Venezuela" <?php if($data['Country']== "Venezuela") echo "selected"; ?>>Venezuela</option>
						<option value="Vietnam" <?php if($data['Country']== "Vietnam") echo "selected"; ?>>Vietnam</option>
						<option value="Virgin Islands (Brit)" <?php if($data['Country']== "Virgin Islands (Brit)") echo "selected"; ?>>Virgin Islands (Brit)</option>
						<option value="Virgin Islands (USA)" <?php if($data['Country']== "Virgin Islands (USA)") echo "selected"; ?>>Virgin Islands (USA)</option>
						<option value="Wake Island" <?php if($data['Country']== "Wake Island") echo "selected"; ?>>Wake Island</option>
						<option value="Wallis &amp; Futana Is" <?php if($data['Country']== "Wallis &amp; Futana Is") echo "selected"; ?>>Wallis &amp; Futana Is</option>
						<option value="Yemen" <?php if($data['Country']== "Yemen") echo "selected"; ?>>Yemen</option>
						<option value="Zambia" <?php if($data['Country']== "Zambia") echo "selected"; ?>>Zambia</option>
						<option value="Zimbabwe" <?php if($data['Country']== "Zimbabwe") echo "selected"; ?>>Zimbabwe</option>
					</select></td>
				<td><span id="var_country" style="color:red;"><?php echo $countryErr;?></span></td>	
			</tr>
			<tr>
				<td>D.O.B</td>
				<td>
				<select name="birthday" id="birthday1" value="year">
					<option value="" selected >year</option>
					  <option value="2015">2015</option>
					  <option value="2014">2014</option>
					  <option value="2013">2013</option>
					  <option value="2012">2012</option>
					  <option value="2011">2011</option>
					  <option value="2010">2010</option>
					  <option value="2009">2009</option>
					  <option value="2008">2008</option>
					  <option value="2007">2007</option>
					  <option value="2006">2006</option>
					  <option value="2005">2005</option>
					  <option value="2004">2004</option>
					  <option value="2003">2003</option>
					  <option value="2002">2002</option>
					  <option value="2001">2001</option>
					  <option value="2000">2000</option>
					  <option value="1999">1999</option>
					  <option value="1998">1998</option>
					  <option value="1997">1997</option>
					  <option value="1996">1996</option>
					  <option value="1995">1995</option>
					  <option value="1994">1994</option>
					  <option value="1993">1993</option>
					  <option value="1992">1992</option>
					  <option value="1991">1991</option>
					  <option value="1990">1990</option>
				</select>
				<select name="birthday" id="birthday2" value="month">
					<option value="" selected >Month</option>
					<option value="1">Jan</option>
					<option value="2">Feb</option>
					<option value="3">Mar</option>
					<option value="4">Apr</option>
					<option value="5">May</option>
					<option value="6">Jun</option>
					<option value="7">July</option>
					<option value="8">Aug</option>
					<option value="9">Sep</option>
					<option value="10">Oct</option>
					<option value="11">Nov</option>
					<option value="12">Dec</option>
				</select>
				<select name="birthday" id="birthday3" value="date">
					<option value="" selected >Day</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>
					<option value="23">23</option>
					<option value="24">24</option>
					<option value="25">25</option>
					<option value="26">26</option>
					<option value="27">27</option>
					<option value="28">28</option>
					<option value="29">29</option>
					<option value="30">30</option>
					<option value="31">31</option>
				</select></td>
					<td><span id="var_birthday" style="color:red;"><?php echo $birthdayErr;?></span></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" id="gender" value="Male" <?php if ($data['Gender'] == 'Male'){ echo $data['Gender']='checked'; } ?>>Male
					<input type="radio" name="gender" id="gender1" value="Female" <?php if ($data['Gender'] == 'Female'){ echo $data['Gender']='checked'; } ?>>Female</td>
					<td><span id="var_gender" style="color:red;"><?php echo $genderErr;?></span></td>
			</tr>
			<tr>
				<td>Admin type:</td>
				<td><input type="checkbox" name="admin" id="admin" value="Admin" <?php if ($data['Admin'] == 'Admin'){ echo $data['Admin']='checked'; } ?>>Admin
					<input type="checkbox" name="admin" id="admin1" value="CoAdmin" <?php if ($data['Admin'] == 'CoAdmin'){ echo $data['Admin']='checked'; } ?>>CoAdmin
					<input type="checkbox" name="admin" id="admin2" value="User" <?php if ($data['Admin'] == 'User'){ echo $data['Admin']='checked'; } ?>>User</td>
					<td><span id="var_admin" style="color:red;"><?php echo $AdminErr;?></span></td>
			</tr>
			<tr>
				<td>Message:</td>
				<td><textarea name="message" rows="5" cols="40"><?php if(isset($data['Message'])){ echo $data['Message']; } ?></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" value="submit" ></td>
			</tr>
		</table>
		
		
		

		
		<?php
		
		if($_POST){
			
		echo '<pre>'; print_r($_POST);
		
		//echo phpinfo();
		//mysql_connect('host','user','password');
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "test";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
					die("Connection failed: " . $conn->connect_error);
				} 

				//$select = mysqli_select_db('test');
				mysqli_select_db($conn,"test");
				$new = "INSERT INTO SignUpForm (user, Name, Email, Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message)
				VALUES ('".$_POST['user']."','".$_POST['fullname']."', '".$_POST['email']."', '".$_POST['pwd']."', '".$_POST['cpwd']."', '".$_POST['country']."', '".$_POST['birthday']."', '".$_POST['gender']."', '".$_POST['admin']."', '".$_POST['message']."')";

				$sql = "UPDATE SignUpForm SET Name = '".$_POST['fullname']."' , Email = '".$_POST['email']."' , Password = '".$_POST['pwd']."' , ConfirmPassword = '".$_POST['cpwd']."' , Country = '".$_POST['country']."' , Birthday = '".$_POST['birthday']."' , Gender = '".$_POST['gender']."' , Admin = '".$_POST['admin']."' , Message = '".$_POST['message']."' ".
				"WHERE user = '". $user ."' ";
				
				if ($conn->query($new) === TRUE) {
					echo "New record created successfully";
				} elseif ($conn->query($sql) === TRUE) {
					echo "New updated record";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

						
						
		//$conn = mysqli_connect('localhost','root','');
		
		//echo $select;
		
		echo "<br>";
		echo $user;
		echo "<br>";
		echo $fullname;
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
		
		
		$conn->close();

		}
		
		?>
	</fieldset>	
</form>

</body>
</html>