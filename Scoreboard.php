<?php
require_once('config.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB,$conn);
session_start();
$user = $_SESSION['username'];
$query1 = "select  * from Slots order by currentBalance desc limit 5";
$result1 = mysql_query($query1) or die(mysql_error());
$query2 = "select  * from Slots order by currentBalance limit 5";
$result2 = mysql_query($query2) or die(mysql_error());
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
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Account.php">Account</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/slotLogic.php">Slot Machine</a></li>
	</ul>
	</div>
	
	<div style="float:right">
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/index.php?action=logout">Logout</a></li>
	</ul>
	</div>
</div> <!-- Top nav end --> 
<br/><br/><br/>
<div style="position:relative;top:-80px;">
<h1 align="center" style="color:lime;position:relative;top:60px;left:2px">High Rollers</h1><h1 align="center">High Rollers</h1>
<table id="pos" class="center">
<tr>
<th>Rank</th>
<th>Username</th>
<th>Score</th>
</tr>
<?php
$count=0;
while($top = mysql_fetch_array($result1))
{
$count++;
echo "<tr align='center'>";
echo "<td>" . $count . "</td>";
echo "<td>" . $top['username'] . "</td>";
echo "<td>" . $top['currentBalance'] . "</td>";
echo "</tr>";
}
?>
</table>
<h1 align="center" style="color:#FF4D4D;position:relative;top:60px;left:2px">Bailout Candidates</h1><h1 align="center">Bailout Candidates</h1>
<table id="neg" class="center">
<tr>
<th>Rank</th>
<th>Username</th>
<th>Score</th>
</tr>
<?php
$query = "select * from Slots";
$result = mysql_query($query) or die(mysql_error());
$count = mysql_num_rows($result);
$count+=1;
while($bottom = mysql_fetch_array($result2))
{
$count--;
echo "<tr align='center'>";
echo "<td>" . $count . "</td>";
echo "<td>" . $bottom['username'] . "</td>";
echo "<td>" . $bottom['currentBalance'] . "</td>";
echo "</tr>";
}
?>
</table>
</div>
<div style="position:absolute;top:94%;" > <!-- Begin bottom navigation -->
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/About.html">About</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Legal.html">Legal</a></li>
	</ul>
</div> <!-- End bottom navigation -->
</body>
</html>