<?php
require('config.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
   or die('Could not connect to MySQL database. ' . mysql_error());
mysql_select_db(SQL_DB,$conn);

session_start();

$blankPic = '"http://secs.oakland.edu/~mrkokko/CSE252-Slots/blankPic.jpg"'; 
$cherry = '"http://secs.oakland.edu/~mrkokko/CSE252-Slots/cherries.jpg"';
$bar = '"http://secs.oakland.edu/~mrkokko/CSE252-Slots/bar.jpg"';
$skull = '"http://secs.oakland.edu/~mrkokko/CSE252-Slots/skull.jpg"';
$seven = '"http://secs.oakland.edu/~mrkokko/CSE252-Slots/red7.jpg"';
$slots = array($cherry,$cherry,$cherry,$bar,$bar,$skull,$seven);

$delta = 0;

$result = mysql_query("SELECT currentBalance FROM Slots WHERE username = '$_SESSION['username']' ");
$row = mysql_fetch_array($result);
$balance = $row['currentBalance'];

$leftPic = $blankPic;
$middlePic = $blankPic;
$rightPic = $blankPic;

function spinreel()
{

$leftVal=rand(0,6);
$middleVal=rand(0,6);
$rightVal=rand(0,6);

global $slots;

global $leftPic=$slots[$leftVal];
global $middlePic=$slots[$middleVal];
global $rightPic=$slots[$rightVal];

$leftAdjust=($leftVal+1)*100;
$middleAdjust=($middleVal+1)*10;
$rightAdjust=$rightVal+1;

$combVal = $leftAdjust + $middleAdjust + $rightAdjust;

global $delta, $balance;

if ($combval == 411 or $combval == 412 or $combval == 413 or $combval == 421 or $combval == 422 or $combval == 423 or $combval == 431 or $combval == 432 or 
$combval == 433 or $combval == 511 or $combval == 512 or $combval == 513 or $combval == 521 or $combval == 522 or $combval == 523 or $combval == 531 or 
$combval == 532 or $combval == 533 or $combval == 711 or $combval == 712 or $combval == 713 or $combval == 721 or $combval == 722 or $combval == 723 or 
$combval == 731 or $combval == 732 or $combval == 733 or $combval == 341 or $combval == 342 or $combval == 343 or $combval == 351 or $combval == 352 or 
$combval == 353 or $combval == 371 or $combval == 372 or $combval == 373 or $combval == 114 or $combval == 115 or $combval == 117 or $combval == 124 or 
$combval == 125 or $combval == 127 or $combval == 134 or $combval == 135 or $combval == 137 or $combval == 214 or $combval == 215 or $combval == 217 or 
$combval == 224 or $combval == 225 or $combval == 227 or $combval == 234 or $combval == 235 or $combval == 237 or $combval == 314 or $combval == 315 or 
$combval == 317 or $combval == 324 or $combval == 325 or $combval == 327 or $combval == 334 or $combval == 335 or $combval == 337 or $combval == 141 or 
$combval == 142 or $combval == 143 or $combval == 151 or $combval == 152 or $combval == 153 or $combval == 171 or $combval == 172 or $combval == 173 or 
$combval == 241 or $combval == 242 or $combval == 243 or $combval == 251 or $combval == 252 or $combval == 253 or $combval == 271 or $combval == 272 or 
$combval == 273) 
{
	$delta = 3;
} 
else 
{ 
	if ($combval == 111 or $combval == 112 or $combval == 113 or $combval == 121 or $combval == 122 or $combval == 123 or $combval == 131 or $combval == 132 or 
$combval == 133 or $combval == 211 or $combval == 212 or $combval == 213 or $combval == 221 or $combval == 222 or $combval == 223 or $combval == 231 or 
$combval == 232 or $combval == 233 or $combval == 311 or $combval == 312 or $combval == 313 or $combval == 321 or $combval == 322 or $combval == 323 or 
$combval == 331 or $combval == 332 or $combval == 333)
	{
		$delta = 15;
	}
	else
	{
		if($combval == 444 or $combval == 445 or $combval == 454 or $combval == 455 or $combval == 544 or $combval == 545 or $combval == 554 or $combval == 555)
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

$balance = $balance + $delta;

mysql_query("UPDATE Slots SET currentBalance = $balance WHERE username = '$_SESSION['username']' ");

}
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
		<a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/slots-login.php?action=logout">Logout</a> 
	</div>
</div> <!-- Top nav end --> 
<br/><br/><br/>

<div> <!-- Begin main stuff -->	
	<div class="slot" style="float:left;background: olive; height: 400px; width: 610px;margin-left:100px"> <!-- Begin slot machine -->
		<p>Slot machine</p>
		
		<div class="slot" style="height: 80px;width:590;margin-left:10px;margin-right:10px"> <!-- Begin pay table -->
			<table>
			<tr>
			<td><p> 2 Cherries <br/> +3 </p></td>
			<td><p> 3 Cherries <br/> +15 </p></td>
			<td><p> 3 Bars <br/> +100 </p></td>
			</tr>
			<tr>
			<td><p> 3 Sevens <br/> +777 </p></td>
			<td><p> 3 Skulls <br/> -666 </p></td>
			<td><p> Everything else <br/> -5 </p></td>
			</tr>
			</table>
		</div> <!-- End pay table -->
		
		<div class="slot" style="height:150px;margin-left:10px;margin-right:10px">	<!-- Begin reels and totals -->
			<div style="float:left;height:150px;width:145px;"> <!-- Begin left reel -->
				<img src=<?php echo $leftPic; ?> style="height:125px;width:120px;"/>
			</div> <!-- End left reel -->
					
			<div class="slot" style="float:left;height:150px;width:145px"> <!-- Begin middle reel -->
				<img src=<?php echo $middlePic; ?> style="height:125px;width:120px;"/>
			</div> <!-- End middle reel -->
			
			<div class="slot" style="float:left;height:150px;width:145px"> <!-- Begin right reel -->
				<img src=<?php echo $rightPic; ?> style="height:125px;width:120px;"/>
			</div> <!-- End right reel -->
		
			<div class="slot" style="background:black;float:left;height:150px;width:145px;"> <!-- Begin totals -->
				<div class="slot" style="height:45px"> <!-- Begin profit/debt -->
					<p style="color:lime;text-align:center"><?php echo $balance; ?></p>
				</div> <!-- End profit/debt -->
			
				<div class="slot" style="height:45px"> <!-- Begin payout -->
					<p style="color:red;text-align:center"><?php echo $delta; ?></p>
				</div> <!-- End payout -->
			
				<div> <!-- Begin spin button -->
					<form method="post" action="slotLogic.php" name="Spin" onsubmit="spinreel()">
					<input type="submit" name="spin" value="Spin">
					</form>
				</div> <!-- End spin button -->
			</div> <!-- End totals -->
		</div> <!-- End reels and totals -->
	</div> <!-- End slot machine -->
	
	<div style="margin-left:810px"> <!-- Begin Google Map Location -->
		<iframe width="400" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Oakland+University,+North+Squirrel+Road,+Rochester,+MI&amp;aq=0&amp;oq=oakland+university&amp;sll=45.00109,-86.270553&amp;sspn=8.235185,21.643066&amp;ie=UTF8&amp;hq=Oakland+University,+North+Squirrel+Road,+Rochester,+MI&amp;hnear=&amp;radius=15000&amp;t=m&amp;cid=16831341248425050265&amp;ll=42.667164,-83.202381&amp;spn=0.018933,0.034246&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>
		<p style="color:red">You are currently developing a gambling addiction <br/> using a website made at this location</p>
	</div> <!-- End Google Map Location -->
</div> <!-- End main stuff -->

<div style="position:absolute;left:10%;top:80%;" > <!-- Begin bottom navigation -->
	<ul  id="navigation">
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/About.html">About</a></li>
		<li><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Legal.html">Legal</a></li>
	</ul>
</div> <!-- End bottom navigation -->

</body>

</html>