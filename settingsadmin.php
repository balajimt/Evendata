<html>
<head>
	<title>Evendata</title>
	<link rel="stylesheet" href="css/setting.css">
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
	<h2 id="maintext"><center>  
	<h2>My Profile</h2></center>
	<br>
	<br>
	<?php
		if(!isset($_COOKIE["user"])) {
			echo "Cookie named '" . $cookie_name . "' is not set!";
		} 
		else {
			//echo "<h2>Congratulations " . $_COOKIE["user"] . "</h2><br>";
			$user_n = $_COOKIE["user"];
		}
		$servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "evendata";
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		$sql="select * from admin where adminUsername='$user_n'";
		$result=$conn->query($sql);
		if($result->num_rows>0) {
			while($row = $result->fetch_assoc()) {
				echo "
					<center><table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
						<tr>
							<td>Username</td>
							<td>".$row["adminUsername"]."</td>
						</tr>
						<tr>
							<td>Roll No</td>
							<td>".$row["adminRollNo"]."</td>
						</tr>
						<tr>
							<td>Mobile</td>
							<td>".$row["adminMobile"]."</td>
						</tr>
						<tr>
							<td>Email</td>
							<td>".$row["adminEmail"]."</td>
						</tr>
					</table>
					<br><br>
					<a href=\"change_passadmin.php\"><button>Change Password</button></a>
					</center>					";
			}
		}
		?>
</h2>
</div>
</body>
</html>
					
					