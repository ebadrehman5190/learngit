<!doctype html>
<html>
<body>

<center>
<table border="1" >
<tr>
<td>
<form name = "registerationform" method="POST" action="welcome.html" onsubmit="return(regvalidate())">
<table>
<tr>
<td>First Name: </td> <td><input type = "text" name="fnametxt" /><br/> </td>
</tr>
<tr>
<td>Second Name: </td> <td> <input type = "text" name="snametxt" /><br/></td>
</tr>
<tr>
<td> User Name:</td> <td><input type = "text" name="unametxt" /><br/> </td>
</tr>
<tr>
<td>Email Address: </td> <td> <input type = "text" name="emailtxt" /><br/></td>
</tr>
</tr>
<tr>
<td> Password : </td> <td> <input type = "password" name="pwdtxt" /> <br/> </td>
</tr>
</tr>
<tr>
<td> Confirm : </td> <td> <input type = "password" name="cpwdtxt" /> <br/> </td>
</tr>
</table>
<font color='red'> <DIV id="une"> </DIV> </font>
<input type = "submit" value="Register Now" />
</form>
</td>
</th>
</tr>
</table>
</tr>
</table>
</tr>
<SCRIPT type="Text/JavaScript">
function regvalidate()

{
if((document.registerationform.fnametxt.value=="")&&(document.registerationform.snametxt.value==""))
 {
  document.getElementById('une').innerHTML = "First name or Second name should not be empty";
  registerationform.fnametxt.focus();
  return(false);
 }

if(document.registerationform.unametxt.value=="")
  {
  document.getElementById('une').innerHTML = "User name field should not be empty";
  registerationform.unametxt.focus();
  return(false);
 }

if(document.registerationform.emailtxt.value=="")
  {
  document.getElementById('une').innerHTML = "Email id requered";
  registerationform.emailtxt.focus();
  return(false);
  }

if(document.registerationform.pwdtxt.value=="")
   {
  document.getElementById('une').innerHTML = "Please type a password";
  registerationform.pwdtxt.focus();
  return(false);
   }

if((document.registerationform.pwdtxt.value) != (document.registerationform.cpwdtxt.value))
   {
  document.getElementById('une').innerHTML = "Password Must be equal";
  registerationform.pwdtxt.value = "";
  registerationform.cpwdtxt.value = "";
  registerationform.pwdtxt.focus();
  return(false);
  }
else
   {
   return(true);
   }
}
</SCRIPT>
</td>
</tr>
</table>
</center>
</body>
</html>