<!DOCTYPE html>
<html>
<head>
     <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<script src="js/main.js"></script>
<div id="mySidenav" class="sidenav">
    <a href="#" id="closebtn" class="closebtn" onclick="closeNav()">&times;</a>
    <img src="images/logo.png" width="120" height="50"></img>
   <ul>
        <li id="Calendar"><a href="calendar.php">Calendar</a></li>
        <li id="Register"><a href="register.php">Register</a></li>
        <li id="History"><a href="history.php">History</a></li>
        <li id="Settings"><a href="settings.php">Settings</a></li>
        <li id="About"><a href="aboutus.php">About us</a></li>
    </ul>
</div>
<div id="main">
    <span id="sideDrawer" style="font-size:45px;cursor:pointer" onmouseover="openNav()">&#9776;
    </span>
    <a href="index.php"><img id="homeKey" src="images/home.png" onmouseover="hover(this);" onmouseout="unhover(this);"></a>
    <a href="logoutprocess.php"><img id="powerButton" src="images/power.png" onmouseover="hoverPower(this);" onmouseout="unhoverPower(this);"></a>
		<center><h2>Events</h2><br><br><br>
		<table cellpadding="0" cellspacing="0" border="0">
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="evendata";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql="SELECT eventid,eventname,eventdate,eventorganizer,eventcontact from eventstatus where DATE(eventdate)>=DATE(NOW()) and eventlevel=4";
$result=$conn->query($sql);

if($result->num_rows>0)
{
	while($row = $result->fetch_assoc())
	{
		echo "
			<tr>
				<td>".$row["eventname"]."</td>
				<td>&#9742; ". $row["eventcontact"]."</td>
				<td class=\"reg\" id=\"myBtn\"><a href=\"event.php?id=".$row["eventid"]."\">Register</a></td>
			</tr>";
	}
}
else
{
	echo "No Events";
}
$conn->close();
?>
		</table>
		</center>
	</div>
	</div>
</body>
</html> 