<!DOCTYPE html>
<html>
<head>
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
    
    if(isset($_COOKIE["type"])){
        $eventId = $_REQUEST['id'];
        header("Location:eventadmin.php?id=".$eventId);
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
        //Checking whether a user already exits on the database
        $sql = "SELECT eventid,eventname,eventcontact,eventdate,eventtime,eventvenue,eventabout,eventorganizer FROM eventstatus WHERE eventId='$eventId' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
              // output data of each row
            while($row = $result->fetch_assoc()) {
               
			echo "
					<h2>".$row["eventname"]."</h2>
					<br>
					<h3>".$row["eventabout"]."</h3><br><br>
					<table cellspacing=\"0\" cellpadding=\"0\" border=\"0\">
					<tr>
						<td class=\"t\">Date:</td>
						<td>".$row["eventdate"]."</td>
					</tr>
					<tr>
						<td class=\"t\">Time:</td>
						<td>".$row["eventtime"]."</td>
					</tr>
					<tr>
						<td class=\"t\">Venue:</td>
						<td>".$row["eventvenue"]."</td>
					</tr>
					<tr>
						<td class=\"t\">Contact:</td>
						<td>".$row["eventcontact"]."</td>
					</tr>
					<tr>
						<td class=\"t\">Organiser:</td>
						<td>".$row["eventorganizer"]."</td>
					</tr>
					</table>
					<br><br>
					<a href=\"success.php?id=".$row["eventid"]."\"><button>Register</button></a>
				";
            }
        }
        else {
            echo "0 results";
        }
        $conn->close();
        ?>
	</center>
    </h2>
</div>
</body>
</html> 
