<?php
require_once('config.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB,$conn);
session_start();
$user = $_SESSION['username'];
$query = "SELECT currentBalance FROM Slots WHERE username = '" . $user . "'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Account</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
<script>
function validateForm()
{
var x=document.forms["change"]["old"].value;
var y=document.forms["change"]["new"].value;
var z=document.forms["change"]["confirm"].value;
if (x==null || x=="")
	{
	alert("Old password must be filled out");
	return false;
	}
if (y==null || y=="")
	{
	alert("New password must be filled out");
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
if (x==y)
	{
	alert("Choose a new password!");
	return false;
	}
	}
</script>
</head>

<body>

<div> <!-- Top nav begin -->
	<div style="float:left">
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/slotLogic.php">Slot Machine</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Scoreboard.php">Scoreboard</a></li>
	</ul>
	</div>
	
	<div style="float:right">
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/index.php?action=logout">Logout</a></li>
	</ul>
	</div>
</div> <!-- Top nav end --> 
<br/><br/><br/>
<div style="position:relative;top:-60px;">
<h1 style="color:#9544A9;position:relative;top:60px;left:2px">Account</h1>
<h1>Account</h1>
<ul>
<li style="width:15%;background-color:#9544A9;"><b>Name:</b> <?php echo $user; ?></li>
<li style="width:15%;background-color:#9544A9;"><b>Current Balance:</b> <?php echo $row['currentBalance']; ?></li>
</ul>
<?php
if($_POST['submit'] == "Change Password")
{
$query = "select password from Slots where username='" . $user . "'";
$result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_array($result);
if($row['password']!=$_POST['old'])
{
?>
<p style="background-color:white;width:20%"><font color="#ff0000"><b>The password entered does not match the old password! Try again.</b></font></p>
<form name="change" action="Account.php" onsubmit="return validateForm()" method="post">
<table style="width=25%;background-color:#9544A9;">
<tr><th align="right">Change Password:</th><th></th></tr>
<tr><td align="right">Old Password: </td><td align="left"><input type="password" name="old"></td></tr>
<tr><td align="right">New Password: </td><td align="left"><input type="password" name="new"></td></tr>
<tr><td align="right">Confirm Password: </td><td align="left"><input type="password" name="confirm"></td></tr>
<tr><td></td><td align="left"><input type="submit" name="submit" value="Change Password"></td></tr>
</table>
</form>
<br/>
<?php
}
else
{
$query = "update Slots set password='" . $_POST['new'] . "' where username='" . $user . "'";
$result = mysql_query($query) or die(mysql_error());
?>
<p style="background-color:#9544A9;width:20%"><b>Password Changed!</b></p>
<form name="change" action="Account.php" onsubmit="return validateForm()" method="post">
<table style="width=25%;background-color:#9544A9;">
<tr><th align="right">Change Password:</th><th></th></tr>
<tr><td align="right">Old Password: </td><td align="left"><input type="password" name="old"></td></tr>
<tr><td align="right">New Password: </td><td align="left"><input type="password" name="new"></td></tr>
<tr><td align="right">Confirm Password: </td><td align="left"><input type="password" name="confirm"></td></tr>
<tr><td></td><td align="left"><input type="submit" name="submit" value="Change Password"></td></tr>
</table>
</form>
<br/>
<?php
}
}
else
{
?>
<form name="change" action="Account.php" onsubmit="return validateForm()" method="post">
<table style="width=25%;background-color:#9544A9;">
<tr><th align="right">Change Password:</th><th></th></tr>
<tr><td align="right">Old Password: </td><td align="left"><input type="password" name="old"></td></tr>
<tr><td align="right">New Password: </td><td align="left"><input type="password" name="new"></td></tr>
<tr><td align="right">Confirm Password: </td><td align="left"><input type="password" name="confirm"></td></tr>
<tr><td></td><td align="left"><input type="submit" name="submit" value="Change Password"></td></tr>
</table>
</form>
<br/>
<?php
}
?>
</div>
<div style="position:absolute;top:94%;" > <!-- Begin bottom navigation -->
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/About.html">About</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Legal.html">Legal</a></li>
	</ul>
</div> <!-- End bottom navigation -->

</body>
</html>