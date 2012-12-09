<?php
require('config.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
   or die('Could not connect to MySQL database. ' . mysql_error());
mysql_select_db(SQL_DB,$conn);
session_start();

$blankPic = "http://secs.oakland.edu/~mrkokko/CSE252-Slots/blankPic.jpg"; 
$cherry = "http://secs.oakland.edu/~mrkokko/CSE252-Slots/cherries.jpg";
$bar = "http://secs.oakland.edu/~mrkokko/CSE252-Slots/bar.jpg";
$skull = "http://secs.oakland.edu/~mrkokko/CSE252-Slots/skull.jpg";
$seven = "http://secs.oakland.edu/~mrkokko/CSE252-Slots/red7.jpg";
$slots = array($cherry,$cherry,$cherry,$bar,$bar,$skull,$seven);

$user = $_SESSION['username'];

$result = mysql_query("SELECT currentBalance FROM Slots WHERE username = '" . $user . "'") or die(mysql_error());
$row = mysql_fetch_array($result);
$oldBalance = $row['currentBalance'];

$leftVal=rand(0,6);
$middleVal=rand(0,6);
$rightVal=rand(0,6);

$leftPic=$slots[$leftVal];
$middlePic=$slots[$middleVal];
$rightPic=$slots[$rightVal];

$leftAdjust=($leftVal+1)*100;
$middleAdjust=($middleVal+1)*10;
$rightAdjust=$rightVal+1;

$combVal = $leftAdjust + $middleAdjust + $rightAdjust;

if ($combVal == 411 or $combVal == 412 or $combVal == 413 or $combVal == 421 or $combVal == 422 or $combVal == 423 or $combVal == 431 or $combVal == 432 or 
$combVal == 433 or $combVal == 511 or $combVal == 512 or $combVal == 513 or $combVal == 521 or $combVal == 522 or $combVal == 523 or $combVal == 531 or 
$combVal == 532 or $combVal == 533 or $combVal == 711 or $combVal == 712 or $combVal == 713 or $combVal == 721 or $combVal == 722 or $combVal == 723 or 
$combVal == 731 or $combVal == 732 or $combVal == 733 or $combVal == 341 or $combVal == 342 or $combVal == 343 or $combVal == 351 or $combVal == 352 or 
$combVal == 353 or $combVal == 371 or $combVal == 372 or $combVal == 373 or $combVal == 114 or $combVal == 115 or $combVal == 117 or $combVal == 124 or 
$combVal == 125 or $combVal == 127 or $combVal == 134 or $combVal == 135 or $combVal == 137 or $combVal == 214 or $combVal == 215 or $combVal == 217 or 
$combVal == 224 or $combVal == 225 or $combVal == 227 or $combVal == 234 or $combVal == 235 or $combVal == 237 or $combVal == 314 or $combVal == 315 or 
$combVal == 317 or $combVal == 324 or $combVal == 325 or $combVal == 327 or $combVal == 334 or $combVal == 335 or $combVal == 337 or $combVal == 141 or 
$combVal == 142 or $combVal == 143 or $combVal == 151 or $combVal == 152 or $combVal == 153 or $combVal == 171 or $combVal == 172 or $combVal == 173 or 
$combVal == 241 or $combVal == 242 or $combVal == 243 or $combVal == 251 or $combVal == 252 or $combVal == 253 or $combVal == 271 or $combVal == 272 or 
$combVal == 273) 
{
 $delta = 3;
} 
else 
{ 
	if ($combVal == 111 or $combVal == 112 or $combVal == 113 or $combVal == 121 or $combVal == 122 or $combVal == 123 or $combVal == 131 or $combVal == 132 or 
$combVal == 133 or $combVal == 211 or $combVal == 212 or $combVal == 213 or $combVal == 221 or $combVal == 222 or $combVal == 223 or $combVal == 231 or 
$combVal == 232 or $combVal == 233 or $combVal == 311 or $combVal == 312 or $combVal == 313 or $combVal == 321 or $combVal == 322 or $combVal == 323 or 
$combVal == 331 or $combVal == 332 or $combVal == 333)
	{
	 $delta = 15;
	}
	else
	{
		if($combVal == 444 or $combVal == 445 or $combVal == 454 or $combVal == 455 or $combVal == 544 or $combVal == 545 or $combVal == 554 or $combVal == 555)
		{
		 $delta = 100;
		}
		else
		{
			if($combVal == 666)
			{
			 $delta = -666;
			}
			else
			{
				if($combVal == 777)
				{
				 $delta = 777;
				}
				else
				{
				 $delta = -5;
				}
			}
		}
	}
}

$balance = $oldBalance + $delta;

mysql_query("UPDATE Slots SET currentBalance = '" . $balance . "' WHERE username = '" . $user . "'");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Slot Machine</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div> <!-- Top nav begin -->
	<div style="float:left">
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Account.php">Account</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Scoreboard.php">Scoreboard</a></li>
	</ul>
	</div>
	
	<div style="float:right">
	<ul id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/index.php?action=logout">Logout</a></li>
	</ul>	
	</div>
</div> <!-- Top nav end --> 
<br/><br/><br/>

<div> <!-- Begin main stuff -->	
	<div class="slot" style="float:left;background:#ff6600;height:400px;width:610px;position:absolute;left:10%;top:15%"> <!-- Begin slot machine -->
		<br/>
		<div style="height:20px;width:2400px;margin-left:5px;margin-right:5px"> <!-- Begin pay table -->
			<table>
			<tr>
			<td><p style="border-right:2px solid black"> 2 Cherries, no Skull<br/> +3 </p></td>
			<td><p style="border-right:2px solid black"> 3 Cherries <br/> +15 </p></td>
			<td><p style="border-right:2px solid black"> 3 Bars <br/> +100 </p></td>
			<td><p style="border-right:2px solid black"> 3 Sevens <br/> +777 </p></td>
			<td><p style="border-right:2px solid black"> 3 Skulls <br/> -666 </p></td>
			<td><p> Everything else <br/> -5 </p></td>
			</tr>
			</table>
		</div> <!-- End pay table -->
		<br/><br/><br/><br/><br/><br/>
		<div style="height:150px;margin-left:10px;margin-right:10px">	<!-- Begin reels and totals -->
			<div style="position:absolute;height:150px;width:145px;"> <!-- Begin left reel -->
				<img <?php echo "src = " . $leftPic . " "; ?> style="height:125px;width:120px;"/>
			</div> <!-- End left reel -->
					
			<div style="position:absolute;left:25%;height:150px;width:145px"> <!-- Begin middle reel -->
				<img <?php echo "src = " . $middlePic . " "; ?> style="height:125px;width:120px;"/>
			</div> <!-- End middle reel -->
			
			<div style="position:absolute;left:50%;height:150px;width:145px"> <!-- Begin right reel -->
				<img <?php echo "src = " . $rightPic . " "; ?> style="height:125px;width:120px;"/>
			</div> <!-- End right reel -->
		
			<div style="background:black;position:absolute;left:75%;height:150px;width:145px;"> <!-- Begin totals -->
				<div style="background:grey;height:45px"> <!-- Begin profit/debt -->
					<p style="color:lime;text-align:center"><?php echo $balance; ?></p>
				</div> <!-- End profit/debt -->
			
				<div style="background:grey;height:45px"> <!-- Begin payout -->
					<p style="color:blue;text-align:center"><?php echo $delta; ?></p>
				</div> <!-- End payout -->
			
				<div class="center"> <!-- Begin spin button -->
					<a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/slotLogic.php" style="color:cyan"> SPIN!!! </a>
				</div> <!-- End spin button -->
			</div> <!-- End totals -->
		</div> <!-- End reels and totals -->
	</div> <!-- End slot machine -->
	
	<div style="position:absolute;left:60%;top:15%"> <!-- Begin Google Map Location -->
		<iframe width="400" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Oakland+University,+North+Squirrel+Road,+Rochester,+MI&amp;aq=0&amp;oq=oakland+university&amp;sll=45.00109,-86.270553&amp;sspn=8.235185,21.643066&amp;ie=UTF8&amp;hq=Oakland+University,+North+Squirrel+Road,+Rochester,+MI&amp;hnear=&amp;radius=15000&amp;t=m&amp;cid=16831341248425050265&amp;ll=42.667164,-83.202381&amp;spn=0.018933,0.034246&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
		<p align="center" style="background:#ff6600;color:black">You are currently developing a gambling addiction <br/> using a website made at the above location.</p>
	</div> <!-- End Google Map Location -->
</div> <!-- End main stuff -->

<div style="position:absolute;top:94%;" > <!-- Begin bottom navigation -->
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/About.html">About</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Legal.html">Legal</a></li>
	</ul>
</div> <!-- End bottom navigation -->

</body>

</html>