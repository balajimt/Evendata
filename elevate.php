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
    <center><img src='images/logo.png' height='50' width='120'></center>
    <ul>
        <li id="Calendar"><a href="calendaradmin.php">Calendar</a></li>
        <li id="Create"><a href="createevent.php">Create Event</a></li>
        <li id="Elevate"><a href="elevate.php">Elevate User</a></li>
        <li id="Approve"><a href="approve.php">Approve Event</a></li>
        <li id="Register"><a href="registeradmin.php">Register</a></li>
        <li id="History"><a href="historyadmin.php">History</a></li>
        <li id="Settings"><a href="settingsadmin.php">Settings</a></li>
        <li id="About"><a href="aboutusadmin.php">About us</a></li>
    </ul>
</div>
<div id="main">
    <span id="sideDrawer" style="font-size:45px;cursor:pointer" onmouseover="openNav()">&#9776;
    </span>
    <a href="index.php"><img id="homeKey" src="images/home.png" onmouseover="hover(this);" onmouseout="unhover(this);"></a>
     <a href="logoutprocess.php"><img id="powerButton" src="images/power.png" onmouseover="hoverPower(this);" onmouseout="unhoverPower(this);"></a>
		<center><h2>Participants List</h2><br><br><br>
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

$sql="SELECT * FROM PARTICIPANTS";
$result=$conn->query($sql);

if($result->num_rows>0)
{
	while($row = $result->fetch_assoc())
	{
		echo "
			<tr>
				<td>".$row["participantUsername"]."</td>
                <td>".$row["participantRollNo"]."</td>
				<td class=\"reg\" id=\"myBtn\"><a href=\"elevateparticipant.php?id=".$row["participantUsername"]."\">Elevate User</a></td>
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
</body>
</html> 