
<?php
require_once('config.php');

$conn = mysql_connect(SQL_HOST, SQL_USER, SQL_PASS)
 or die('Could not connect to MySQL database. ' . mysql_error());

mysql_select_db(SQL_DB,$conn);
session_start();

if (isset($_POST["login"])) {
     login();
   } elseif (isset($_GET["action"] ) and $_GET["action"] == "logout" ) {
     logout();
   } elseif (isset($_SESSION["username"])) {
     displayPage();
   } else {
     displayLoginForm();
   }

function login() {
    if (isset($_POST["username"] ) and isset($_POST["password"])) {
		$query = "SELECT username, password FROM Slots WHERE username = '" .
          $_POST['username'] . "' AND password = '" . $_POST['password']
          . "';";
     $result = mysql_query($query) or die(mysql_error());
     if (mysql_num_rows($result) == 1) {
        $_SESSION['username'] = $_POST['username'];
        session_write_close();
        header("Location: slots-login.php");
        } else {
        displayLoginForm("Sorry, that username/password could not be found. Please try again." );
        }
      }
    }

function logout() {
    unset($_SESSION["username"]);
    session_write_close();
    header("Location: slots-login.php" );
    }

function displayPage() {
   displayPageHeader();
?>
<br/><br/><br/><br/>
<p class="center"  style="background-color:white;width:20%">Welcome, <strong><?php echo $_SESSION["username"] ?></strong>! You are currently logged in. Good job! <a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/SlotMachine.html">Click here</a> to go to the Slot Machine page</p>
   <p><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/slots-login.php?action=logout">Logout</a></p>
   </body>
  </html>
 <?php
}

function displayLoginForm($message="") {
   displayPageHeader();
?>
<br/><br/><br/>
  <?php if ($message) echo '<p class="center"  style="background-color:white;width:20%">' . $message .'<p>' ?>
<div>
<h1 class="center" style="background-color:white;width:10%">Login</h1>
<form name="Login" action="slots-login.php" onsubmit="return validateForm()" method="post">
<table class="center"  style="width:25%">
<tr><td align="right">Username: </td><td align="left"><input type="text" name="username"></td></tr>
<tr><td align="right">Password: </td><td align="left"><input type="password" name="password"></td></tr>
<tr><td></td><td align="left"><input type="submit" name="login" value="Login"></td></tr>
<tr><td></td><td align="left"><a href="http://secs.oakland.edu/~mrkokko/CSE252-Slots/Register.html">Register?</a></td>
</table>
</form>
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
<?php
}

function displayPageHeader() {
  ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Login</title>
<link href="Style.css" rel="stylesheet" type="text/css" />
<script>
function validateForm()
{
var x=document.forms["login"]["user"].value;
var y=document.forms["login"]["password"].value;
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
}
</script>
</head>
<body>
 <?php
}
?>