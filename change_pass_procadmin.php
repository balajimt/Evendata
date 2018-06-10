<html>
<head>
	<title>Evendata</title>
	<link rel="stylesheet" href="css/event.css">
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
	<center>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evendata";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$oldpass = $_POST["old_password"];
$newpass = $_POST["new_password"];
$repass = $_POST["reenter_password"];
$newpassFinal = password_hash($_POST["new_password"],PASSWORD_BCRYPT);
$repassFinal = password_hash($_POST["reenter_password"],PASSWORD_BCRYPT);
	if(!isset($_COOKIE["user"])){
        //echo "Comes here";
        //echo $_COOKIE["user"];
        header("Location:login.php");
        exit;
    }
	if(!isset($_COOKIE["user"])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
      //  echo "<h2>Congratulations " . $_COOKIE["user"] . "</h2><br>";
		$user_n = $_COOKIE["user"];
    }

$sql = "Select participantpassword from participants where participantusername = '$user_n' ";

$result = $conn->query($sql);
$row = $result->fetch_assoc();
if((password_verify($oldpass,$row["participantpassword"])) && ($newpass == $repass)) {

		if(password_verify($newpass,$row["participantpassword"])) {
			echo "<img src=\"images/warn.png\" width=\"80\" height=\"80\"></img><br><br><h2>Sorry. This password has been used recently. Please set a new Password.</h2>
			<br><br><a href=\"change_pass.php\"><button>Ok</button></a> ";
		}
		else {
		$sql1 = "update participants set participantpassword='$newpassFinal' where participantusername='$user_n' ";
		$result1 = $conn->query($sql1);
		echo "<img src=\"images/tick.png\" width=\"80\" height=\"80\"></img><br><br><h2>Congratulations! You have successfully changed your password.</h2>
		<br><br><a href=\"indexadmin.php\"><button>Ok</button></a>";
		}
}
else {
	echo "<h2><img src=\"images/error.png\" width=\"80\" height=\"80\"><br><br></img>Sorry! Invalid Operation.</h2>
	<br><br><a href=\"change_passadmin.php\"><button>Try Again</button></a>";
}

?>
</center>
</div>
</body>
</html>