<?php
require_once('config.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB,$conn);
$user = $_SESSION['username']
$query = "select currentBalance from Slots where username = '" . $user . "'";
$result = mysql_query($query) or die(mysql_error());
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Scoreboard</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div> <!-- Top nav begin -->
	<div style="float:left">
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Account.html">Account</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/SlotMachine.html">Slot Machine</a></li>
	</ul>
	</div>
	
	<div style="float:right">
		<a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/slots-login.php?action=logout">Logout</a> 
	</div>
</div> <!-- Top nav end --> 
<br/><br/><br/>
<div>
<h1 align="center">High Rollers</h1>
<table id="pos" class="center">
<tr>
<th>Rank</th>
<th>Username</th>
<th>Score</th>
</tr>
<tr align="center">
<td>1</td>
<td>Stefan</td>
<td>9001</td>
</tr>
</table>
<br/><br/><br/>
<h1 align="center">Bailout Candidates</h1>
<table id="neg" class="center">
<tr>
<th>Rank</th>
<th>Username</th>
<th>Score</th>
</tr>
<tr align="center">
<td>100</td>
<td>Mitch</td>
<td>-9001</td>
</tr>
</table>
</div>
<br/><br/><br/><br/><br/><br/>

<div> <!-- Begin bottom navigation -->
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/About.html">About</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Legal.html">Legal</a></li>
	</ul>
</div> <!-- End bottom navigation -->
</body>
</html>