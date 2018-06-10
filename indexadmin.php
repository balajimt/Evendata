<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/clock.css">
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
    if(!isset($_COOKIE["type"])){
        //echo "Comes here";
        //echo $_COOKIE["user"];
        header("Location:index.php");
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
        echo "Welcome back " . $_COOKIE["user"] . "!<br>";
    }
    ?>
    </center></h2>
    <div class="logo"></div>
    <div class="clock-wrap">
  		<div class="hour-wrap">
				<div class="digit-top">
					<div class="front">00</div>
					<div class="back">00</div>
				</div>
				<div class="digit-bottom">
					<div class="front">00</div>
				</div>
        </div>
        <div class="min-wrap">
				<div class="digit-top">
					<div class="front">00</div>
					<div class="back">00</div>
				</div>
				<div class="digit-bottom">
					<div class="front">00</div>
				</div>
        </div>
        <div class="sec-wrap">
				<div class="digit-top">
					<div class="front">00</div>
					<div class="back">00</div>
				</div>
				<div class="digit-bottom">
					<div class="front">00</div>
				</div>
        </div>
    </div>
    <center><div id="todayDate"></div>
    <br>
    <br>
    <div id="todayEvents">
        <br>
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
        $sql = "SELECT * FROM eventstatus WHERE DATE(eventDate)=DATE(NOW())";
        $result = $conn->query($sql);
        echo "<table class=\"tableEvents\">";
        if ($result->num_rows > 0) {
              // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<tr class=\"tableRow\">";
                echo "<td class=\"tableName\"><a href=\"event.php?id=".$row["eventId"]."\">".$row["eventName"] . "</td><td class=\"tableTime\">". $row["eventTime"]."</td>";
                echo "</tr>";
            }
        }
        else {
            echo "0 results";
        }
        echo "</table>";
        $conn->close();
        ?>
    </div>
    </center>
    <script src='js/yui.js'></script>
    <script src="js/clock.js"></script>
    <script>
        var currentDate  = new Date(),
            currentDay   = currentDate.getDate() < 10 
                 ? '0' + currentDate.getDate() 
                 : currentDate.getDate(),
            currentMonth = currentDate.getMonth() < 9 
                 ? '0' + (currentDate.getMonth() + 1) 
                 : (currentDate.getMonth() + 1);

        document.getElementById("todayDate").innerHTML = currentDay + '/' + currentMonth + '/' +  currentDate.getFullYear() + '<br><br>Schedule<br>';
    </script>

</div>
</body>
</html> 