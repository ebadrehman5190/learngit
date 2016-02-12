<!doctype html>
<html>
<head>

<title>
Sign up form
</title>

</head>
<body>

<form>
<p>
Email Address:<br>
<input type="text" id="email-address" name="email" style="width:200px;">
</p>
<p id="my-error-message-container" onclick="alert ErrorCheck()" style="display:none; border:1px solid red; color:red; background-color:yellow; font-weight:bold; padding:5px; width:188px;"></p>
<input type="submit" value="Submit Form" style="width:200px;">
</form>

<script type="text/javascript">
function RemoveErrorMessageFromPage()
{
   var IDofContainer = "my-error-message-container";
   document.getElementById(IDofContainer).innerHTML = "";
   document.getElementById(IDofContainer).style.display = "none";
}

function InsertErrorMessageIntoPage(content)
{
   var IDofContainer = "my-error-message-container";
   document.getElementById(IDofContainer).style.display = "";
   document.getElementById(IDofContainer).innerHTML = content;
}

function ErrorCheck()
{
   RemoveErrorMessageFromPage();
   var email = document.getElementById("email-address").value;
   if( ! email.length )
   {
      InsertErrorMessageIntoPage("The email address is required.");
      return false;
   }
   if( ! email.match(/\w@\w+\.\w/) )
   {
      InsertErrorMessageIntoPage("The email address appears to be invalid.");
      return false;
   }
   return true;
}
</script>

</body>
</html>