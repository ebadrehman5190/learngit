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
				
				$edit = "SELECT userid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE userid='". $_GET['id'] ."' ";

				$record = mysqli_query($conn,$edit);
				$data = mysqli_fetch_array($record);
				
			if (isset($data)){
				//echo "SELECT u	serid,Name,Email,Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message FROM SignUpForm WHERE userid='". $_GET['id'] ."' " ;
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
			if(document.getElementById("userid").value == ""){
				document.getElementById("var_userid").innerHTML="please enter the username";
				validate = false;
			}else{
				document.getElementById("var_userid").innerHTML="";
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

$useridErr=$fullnameErr=$emailErr=$pwdErr=$cpwdErr=$confirmpwdErr=$countryErr=$birthdayErr=$genderErr=$AdminErr="";
$userid=$fullname=$email=$pwd=$cpwd=$country=$birthday=$gender=$admin=$message="";


	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["userid"])){
			$useridErr="user name is required";
		} else {
			$userid = test_input($_POST["userid"]);
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
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

?>
<form name="Registration" class="form_title" action="" method="POST" onSubmit="return revalidate()">
	<fieldset class="field_set" src="SMWpCenterPinch.png">
	<legend><h1>Registration</h1></legend>
		<table>
			<tr>
				<td>UserName:</td>
				<td><input type="text" name="userid" id="userid" value="<?php if(isset($data['userid'])){ echo $data['userid']; } ?>"></td>
				<td><span id="var_userid" style="color:red;"><?php echo $useridErr;?></span></td>
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
					<select name="country" id="country" value="<?php if(isset($data['Country'])){ echo $data['Country']; } ?>" selected>
						<option value="">Select country</option>
						<option value="United States of America">United States of America</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="Australia">Australia</option>
						<option value="Canada">Canada</option>
						<option value="Afghanistan">Afghanistan</option>
						<option value="Albania">Albania</option>
						<option value="Algeria">Algeria</option>
						<option value="American Samoa">American Samoa</option>
						<option value="Andorra">Andorra</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua &amp; Barbuda">Antigua &amp; Barbuda</option>
						<option value="Argentina">Argentina</option>
						<option value="Armenia">Armenia</option>
						<option value="Aruba">Aruba</option>
						<option value="Australia">Australia</option>
						<option value="Austria">Austria</option>
						<option value="Azerbaijan">Azerbaijan</option>
						<option value="Azores">Azores</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahrain">Bahrain</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbados">Barbados</option>
						<option value="Belarus">Belarus</option>
						<option value="Belgium">Belgium</option>
						<option value="Belize">Belize</option>
						<option value="Benin">Benin</option>
						<option value="Bermuda">Bermuda</option>
						<option value="Bhutan">Bhutan</option>
						<option value="Bolivia">Bolivia</option>
						<option value="Bonaire">Bonaire</option>
						<option value="Bosnia &amp; Herzegovina">Bosnia &amp; Herzegovina</option>
						<option value="Botswana">Botswana</option>
						<option value="Brazil">Brazil</option>
						<option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
						<option value="Brunei">Brunei</option>
						<option value="Bulgaria">Bulgaria</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="Cambodia">Cambodia</option>
						<option value="Cameroon">Cameroon</option>
						<option value="Canada">Canada</option>
						<option value="Canary Islands">Canary Islands</option>
						<option value="Cape Verde">Cape Verde</option>
						<option value="Cayman Islands">Cayman Islands</option>
						<option value="Central African Republic">Central African Republic</option>
						<option value="Chad">Chad</option>
						<option value="Channel Islands">Channel Islands</option>
						<option value="Chile">Chile</option>
						<option value="China">China</option>
						<option value="Christmas Island">Christmas Island</option>
						<option value="Cocos Island">Cocos Island</option>
						<option value="Colombia">Colombia</option>
						<option value="Comoros">Comoros</option>
						<option value="Congo">Congo</option>
						<option value="Congo Democratic Rep">Congo Democratic Rep</option>
						<option value="Cook Islands">Cook Islands</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Cote DIvoire">Cote D'Ivoire</option>
						<option value="Croatia">Croatia</option>
						<option value="Cuba">Cuba</option>
						<option value="Curacao">Curacao</option>
						<option value="Cyprus">Cyprus</option>
						<option value="Czech Republic">Czech Republic</option>
						<option value="Denmark">Denmark</option>
						<option value="Djibouti">Djibouti</option>
						<option value="Dominica">Dominica</option>
						<option value="Dominican Republic">Dominican Republic</option>
						<option value="East Timor">East Timor</option>
						<option value="Ecuador">Ecuador</option>
						<option value="Egypt">Egypt</option>
						<option value="El Salvador">El Salvador</option>
						<option value="Equatorial Guinea">Equatorial Guinea</option>
						<option value="Eritrea">Eritrea</option>
						<option value="Estonia">Estonia</option>
						<option value="Ethiopia">Ethiopia</option>
						<option value="Falkland Islands">Falkland Islands</option>
						<option value="Faroe Islands">Faroe Islands</option>
						<option value="Fiji">Fiji</option>
						<option value="Finland">Finland</option>
						<option value="France">France</option>
						<option value="French Guiana">French Guiana</option>
						<option value="French Polynesia">French Polynesia</option>
						<option value="French Southern Ter">French Southern Ter</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambia">Gambia</option>
						<option value="Georgia">Georgia</option>
						<option value="Germany">Germany</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Great Britain">Great Britain</option>
						<option value="Greece">Greece</option>
						<option value="Greenland">Greenland</option>
						<option value="Grenada">Grenada</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guernsey">Guernsey</option>
						<option value="Guinea">Guinea</option>
						<option value="Guinea-Bissau">Guinea-Bissau</option>
						<option value="Guyana">Guyana</option>
						<option value="Haiti">Haiti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hungary">Hungary</option>
						<option value="Iceland">Iceland</option>
						<option value="India">India</option>
						<option value="Indonesia">Indonesia</option>
						<option value="Iran">Iran</option>
						<option value="Iraq">Iraq</option>
						<option value="Ireland">Ireland</option>
						<option value="Isle of Man">Isle of Man</option>
						<option value="Israel">Israel</option>
						<option value="Italy">Italy</option>
						<option value="Jamaica">Jamaica</option>
						<option value="Japan">Japan</option>
						<option value="Jersey">Jersey</option>
						<option value="Jordan">Jordan</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>
						<option value="Kiribati">Kiribati</option>
						<option value="Korea North">Korea North</option>
						<option value="Korea South">Korea South</option>
						<option value="Kuwait">Kuwait</option>
						<option value="Kyrgyzstan">Kyrgyzstan</option>
						<option value="Laos">Laos</option>
						<option value="Latvia">Latvia</option>
						<option value="Lebanon">Lebanon</option>
						<option value="Lesotho">Lesotho</option>
						<option value="Liberia">Liberia</option>
						<option value="Libya">Libya</option>
						<option value="Liechtenstein">Liechtenstein</option>
						<option value="Lithuania">Lithuania</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="Macau">Macau</option>
						<option value="Macedonia">Macedonia</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malawi">Malawi</option>
						<option value="Malaysia">Malaysia</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malta">Malta</option>
						<option value="Marshall Islands">Marshall Islands</option>
						<option value="Martinique">Martinique</option>
						<option value="Mauritania">Mauritania</option>
						<option value="Mauritius">Mauritius</option>
						<option value="Mayotte">Mayotte</option>
						<option value="Mexico">Mexico</option>
						<option value="Midway Islands">Midway Islands</option>
						<option value="Moldova">Moldova</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolia">Mongolia</option>
						<option value="Montenegro">Montenegro</option>
						<option value="Montserrat">Montserrat</option>
						<option value="Morocco">Morocco</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar">Myanmar</option>
						<option value="Namibia">Namibia</option>
						<option value="Nauru">Nauru</option>
						<option value="Nepal">Nepal</option>
						<option value="Netherland Antilles">Netherland Antilles</option>
						<option value="Netherlands">Netherlands</option>
						<option value="Nevis">Nevis</option>
						<option value="New Caledonia">New Caledonia</option>
						<option value="New Zealand">New Zealand</option>
						<option value="Nicaragua">Nicaragua</option>
						<option value="Niger">Niger</option>
						<option value="Nigeria">Nigeria</option>
						<option value="Niue">Niue</option>
						<option value="Norfolk Island">Norfolk Island</option>
						<option value="Norway">Norway</option>
						<option value="Oman">Oman</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Palau Island">Palau Island</option>
						<option value="Palestine">Palestine</option>
						<option value="Panama">Panama</option>
						<option value="Papua New Guinea">Papua New Guinea</option>
						<option value="Paraguay">Paraguay</option>
						<option value="Peru">Peru</option>
						<option value="Philippines">Philippines</option>
						<option value="Pitcairn Island">Pitcairn Island</option>
						<option value="Poland">Poland</option>
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="Qatar">Qatar</option>
						<option value="Reunion">Reunion</option>
						<option value="Romania">Romania</option>
						<option value="Russia">Russia</option>
						<option value="Rwanda">Rwanda</option>
						<option value="Saipan">Saipan</option>
						<option value="Samoa">Samoa</option>
						<option value="Samoa American">Samoa American</option>
						<option value="San Marino">San Marino</option>
						<option value="Sao Tome &amp; Principe">Sao Tome &amp; Principe</option>
						<option value="Saudi Arabia">Saudi Arabia</option>
						<option value="Senegal">Senegal</option>
						<option value="Serbia">Serbia</option>
						<option value="Serbia &amp; Montenegro">Serbia &amp; Montenegro</option>
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapore">Singapore</option>
						<option value="Slovakia">Slovakia</option>
						<option value="Slovenia">Slovenia</option>
						<option value="Solomon Islands">Solomon Islands</option>
						<option value="Somalia">Somalia</option>
						<option value="South Africa">South Africa</option>
						<option value="South Sudan">South Sudan</option>
						<option value="Spain">Spain</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="St Barthelemy">St Barthelemy</option>
						<option value="St Eustatius">St Eustatius</option>
						<option value="St Helena">St Helena</option>
						<option value="St Kitts-Nevis">St Kitts-Nevis</option>
						<option value="St Lucia">St Lucia</option>
						<option value="St Maarten">St Maarten</option>
						<option value="St Pierre &amp; Miquelon">St Pierre &amp; Miquelon</option>
						<option value="St Vincent &amp; Grenadines">St Vincent &amp; Grenadines</option>
						<option value="Sudan">Sudan</option>
						<option value="Suriname">Suriname</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Sweden">Sweden</option>
						<option value="Switzerland">Switzerland</option>
						<option value="Syria">Syria</option>
						<option value="Tahiti">Tahiti</option>
						<option value="Taiwan">Taiwan</option>
						<option value="Tajikistan">Tajikistan</option>
						<option value="Tanzania">Tanzania</option>
						<option value="Thailand">Thailand</option>
						<option value="Togo">Togo</option>
						<option value="Tokelau">Tokelau</option>
						<option value="Tonga">Tonga</option>
						<option value="Trinidad &amp; Tobago">Trinidad &amp; Tobago</option>
						<option value="Tunisia">Tunisia</option>
						<option value="Turkey">Turkey</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks &amp; Caicos Is">Turks &amp; Caicos Is</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="Uganda">Uganda</option>
						<option value="Ukraine">Ukraine</option>
						<option value="United Arab Emirates">United Arab Emirates</option>
						<option value="United Kingdom">United Kingdom</option>
						<option value="United States of America">United States of America</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Uzbekistan">Uzbekistan</option>
						<option value="Vanuatu">Vanuatu</option>
						<option value="Vatican City State">Vatican City State</option>
						<option value="Venezuela">Venezuela</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
						<option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
						<option value="Wake Island">Wake Island</option>
						<option value="Wallis &amp; Futana Is">Wallis &amp; Futana Is</option>
						<option value="Yemen">Yemen</option>
						<option value="Zambia">Zambia</option>
						<option value="Zimbabwe">Zimbabwe</option>
					</select></td>
				<td><span id="var_country" style="color:red;"><?php echo $countryErr;?></span></td>	
			</tr>
			<tr>
				<td>D.O.B</td>
				<td><select name="birthday" id="birthday1">
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
				<select name="birthday" id="birthday2">
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
				</select>
				<select name="birthday" id="birthday3">
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
				</select></td>
					<td><span id="var_birthday" style="color:red;"><?php echo $birthdayErr;?></span></td>
			</tr>
			<tr>
				<td>Gender:</td>
				<td><input type="radio" name="gender" id="gender" value="Male" >Male
					<input type="radio" name="gender" id="gender1" value="Female">Female</td>
					<td><span id="var_gender" style="color:red;"><?php echo $genderErr;?></span></td>
			</tr>
			<tr>
				<td>Admin type:</td>
				<td><input type="checkbox" name="admin" id="admin" value="Admin">Admin
					<input type="checkbox" name="admin" id="admin1" value="CoAdmin">CoAdmin
					<input type="checkbox" name="admin" id="admin2" value="User" >User</td>
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
				$new = "INSERT INTO SignUpForm (Userid, Name, Email, Password,ConfirmPassword,Country,Birthday,Gender,Admin,Message)
				VALUES ('".$_POST['userid']."','".$_POST['fullname']."', '".$_POST['email']."', '".$_POST['pwd']."', '".$_POST['cpwd']."', '".$_POST['country']."', '".$_POST['birthday']."', '".$_POST['gender']."', '".$_POST['admin']."', '".$_POST['message']."')";

				$sql = "UPDATE SignUpForm SET Name = '".$_POST['fullname']."' , Email = '".$_POST['email']."' , Password = '".$_POST['pwd']."' , ConfirmPassword = '".$_POST['cpwd']."' , Country = '".$_POST['country']."' , Birthday = '".$_POST['birthday']."' , Gender = '".$_POST['gender']."' , Admin = '".$_POST['admin']."' , Message = '".$_POST['message']."' ".
				"WHERE userid = '". $userid ."' ";
				
				if ($conn->query($new) === TRUE) {
					echo "New record created successfully";
				} elseif ($conn->query($sql) === TRUE) {
					echo "New updated record";
				} else {
					echo "Error: " . $sql . "<br>" . $conn->error;
				}

				$conn->close();
						
						
		//$conn = mysqli_connect('localhost','root','');
		
		//echo $select;
		
		echo "<br>";
		echo $userid;
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
		
		}
		
		?>
	</fieldset>	
</form>

</body>
</html>