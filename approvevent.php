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
            <a href="logoutprocess.php"><img id="powerButton" src="images/power.png" onmouseover="hoverPower(this);" onmouseout="unhoverPower(this);"></a>
            <h2 id="maintext">
                <center>
                <?php
                if(!isset($_COOKIE["user"])) {
                    echo "Cookie named '" . $cookie_name . "' is not set!";
                } 
                else {
                    echo "<h2>Congratulations Event id" . $_REQUEST['id'] . " has been successfully approved by you!</h2><br>";
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
                $username = $_COOKIE["user"];
                $sql = "SELECT * FROM admin WHERE adminUsername = '$username'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $sql = "UPDATE EVENTSTATUS SET eventLevel=".$row['adminLevel']." WHERE eventId='$eventId'";
                $result = $conn->query($sql);
				echo "
						<img src=\"images/tick.png\" width=\"70\" height=\"70\"></img><br><p> </p>
				<br><br><a href=\"indexadmin.php\"><button>OK</button></a>";
	           ?>
                </center>
            </h2>
        </div>
</body>

</html>