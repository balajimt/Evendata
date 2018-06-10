<html>
<head>
	<title>Evendata</title>
	<link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="css/event.css">
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
    <?php
    if(!isset($_COOKIE["user"])) {
        echo "Cookie named '" . $cookie_name . "' is not set!";
    } else {
        echo "<h2>Congratulations " . $_REQUEST['id'] . " has been successfully elevated</h2><br>";
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
        $participantId = $_REQUEST['id'];
		$sql = "SELECT * FROM PARTICIPANTS WHERE participantUsername='$participantId' ";
		$result = $conn->query($sql);
        $row = $result->fetch_assoc();
        
        $password = $row['participantPassword'];
        $class = $row['participantClass'];
        $roll = $row['participantRollNo'];
        $mobile = $row['participantMobile'];
        $email = $row['participantEmail'];
        $level = 1;
        $type = 'Basic';
        
        $sql = "DELETE FROM PARTICIPANTS WHERE participantUsername='$participantId' ";
        $result = $conn->query($sql);
        
        $sql = "UPDATE users SET userType='ADMIN' WHERE userId='$participantId'";
        $result = $conn->query($sql);
        
        $sql = "INSERT INTO ADMIN VALUES('$participantId','$password','$roll',$mobile,'$email','$level','$type')";
        $result = $conn->query($sql);
	?>
    </center></h2>
	</div>
	</body>
	</html>