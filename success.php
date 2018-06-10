<html>
<head>
	<title>Evendata</title>
	<link rel="stylesheet" href="css/table.css">
     <link rel="stylesheet" href="css/event.css">
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
	<h2 id="maintext"><center>  
    <?php
    if(!isset($_COOKIE["user"])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "<h2>Congratulations " . $_COOKIE["user"] . "</h2><br>";
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
        $eventId = $_REQUEST['id'];
		$sql = "SELECT eventname FROM eventstatus WHERE eventId='$eventId' ";
		$result = $conn->query($sql);
		$temp_sql="Select * from eventlog where eventId='$eventId' and userName='$user_n'";
		$result1 = $conn->query($temp_sql);
		if($result1->num_rows == 0) { 
			$sql1="Insert into eventlog (eventid,username) values ('$eventId','$user_n')";
			$conn->query($sql1);
			if ($result->num_rows > 0) {
				  // output data of each row
				while($row = $result->fetch_assoc()) {
				   
				echo "
						<img src=\"images/tick.png\" width=\"70\" height=\"70\"></img><br><p>You have successfully registered for event ".$row["eventname"]."</p>
				<br><br><a href=\"indexadmin.php\"><button>OK</button></a>";
				}
			}
		}
		else {
			echo "<p>You have already registered for this event.</p>
			<br><br><a href=\"indexadmin.php\"><button>OK</button></a>";
		}
			
	?>
    </center></h2>
	</div>
	</body>
	</html>