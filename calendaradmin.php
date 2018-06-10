<!DOCTYPE html>
<html>

<head>
    <title>Calendar</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/calendarstyle.css">
</head>
<?php
    if(!isset($_COOKIE["user"])){
        //echo "Comes here";
        //echo $_COOKIE["user"];
        header("Location:login.php");
        exit;
    }
?>

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
            <a href="logoutprocess.php"><img id="powerButton" src="images/power.png" onmouseover="hoverPower(this);" onmouseout="unhoverPower(this);"></a>
            <br>
            <br>
            <div id="calendar"></div>
            <script src="js/moment.min.js"></script>
            <script src="js/index.js"></script>
            <script>
                ! function() {
                    //Get data from sql database here
                    var data = [
                        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "evendata";

            // Create connection
            // Object oriented approach
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
           $sql = "SELECT * FROM EVENTSTATUS WHERE eventLevel=4";
                        $result = $conn->query($sql);
          while($row = $result->fetch_assoc()) {
               echo "{ eventName: \"".$row["eventName"]. "\", calendar: 'Event', color: 'orange', date:\"" .$row["eventDate"]."\" , id:\"" .$row["eventId"]."\"},";
          }
          ?>
                    ];
                    var calendar = new Calendar('#calendar', data);
                }();
            </script>
        </div>
    </body>

</html>