<?php
require_once('config.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB,$conn);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Register</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
<script>
function validateForm()
{
var x=document.forms["register"]["user"].value;
var y=document.forms["register"]["password"].value;
var z=document.forms["register"]["confirm"].value;
if (x==null || x=="")
  {
  alert("Username must be filled out");
  return false;
  }
if (y==null || y=="")
  {
  alert("Password must be filled out");
  return false;
  }
if (z==null || z=="")
  {
  alert("Confirmation password must be filled out");
  return false;
  }
if (y!=z)
  {
  alert("Passwords must match!");
  return false;
  }
}
</script>
</head>
<body>
<br/><br/><br/>
<?php
if ($_POST['submit'] == "Register")
{
$check_user = $_POST['user'];
$query = "Select username from Slots where username = '$check_user';";
$result = mysql_query($query) or die(mysql_error());
if (mysql_num_rows($result) != 0)
{
?>
<p class="center" style="background-color:white;width:20%"><font color="#ff0000"><b>The Username, <?php echo $_POST['user']; ?>, is already in use, please choose another!</b></font></p>
<h1 class="center" style="background-color:white;width:20%">Welcome to the Registration Page!</h1>
<form name="register" action="Register.php" onsubmit="return validateForm()" method="post">
<table class="center"  style="width:25%">
<tr><td align="right">Username: </td><td align="left"><input type="text" name="user"></td></tr>
<tr><td align="right">Password: </td><td align="left"><input type="password" name="password"></td></tr>
<tr><td align="right">Confirm Password: </td><td align="left"><input type="password" name="confirm"></td></tr>
<tr><td></td><td align="left"><input type="submit" name="submit" value="Register"></td></tr>
</table>
</form>
<?php
}
else
{
$query = "Insert into Slots(username, password) values ('" . $_POST['user'] . "', '" . $_POST['password'] . "');";
$result = mysql_query($query) or die(mysql_error());
$_SESSION['username'] = $_POST['user'];
?>
<p class="center" style="background-color:white;width:20%">Thank you, <?php echo $_POST['user']; ?> for registering!<br /><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/SlotMachine.html">Click Here</a> to continue to the Slot Machine.</p>
<?php
}
} 
else
{
?>
<div>
<h1 class="center" style="background-color:white;width:20%">Welcome to the Registration Page!</h1>
<form name="register" action="Register.php" onsubmit="return validateForm()" method="post">
<table class="center"  style="width:25%">
<tr><td align="right">Username: </td><td align="left"><input type="text" name="user"></td></tr>
<tr><td align="right">Password: </td><td align="left"><input type="password" name="password"></td></tr>
<tr><td align="right">Confirm Password: </td><td align="left"><input type="password" name="confirm"></td></tr>
<tr><td></td><td align="left"><input type="submit" name="submit" value="Register"></td></tr>
</table>
</form>
</div>
<?php
}
?>
<br/><br/><br/><br/><br/><br/>
<div> <!-- Begin bottom navigation -->
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/altAbout.html">About</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/altLegal.html">Legal</a></li>
	</ul>
</div> <!-- End bottom navigation -->
</body>
</html>