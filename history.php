
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php
    if(!isset($_COOKIE["user"])){
        //echo "Comes here";
        //echo $_COOKIE["user"];
        header("Location:login.php");
        exit;
    }
    ?>
<script src="js/main.js"></script>
<div id="mySidenav" class="sidenav">
    <a href="#" id="closebtn" class="closebtn" onclick="closeNav()">&times;</a>
    <center><img src='images/logo.png' height='50' width='120'></center>
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
		<center><h2>History of Events</h2><br><br><br>
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

            $username = $_COOKIE["user"];

$sql = "SELECT * FROM eventlog where userName='$username'";
$result = $conn->query($sql);
if($result->num_rows>0)
{
	while($row = $result->fetch_assoc())
	{
        $sql = "SELECT * FROM eventStatus where eventId='".$row['eventId']."'";
        $eventData = $conn->query($sql);
        $rowData = $eventData->fetch_assoc();
		echo "
			<tr>
				<td>".$rowData["eventName"]."</td>
				<td>Organized By ". $rowData["eventOrganizer"]."</td>
				<td>&#9742; ". $rowData["eventContact"]."</td>
                <td>Position :  ". $row["finalPos"]."</td>
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