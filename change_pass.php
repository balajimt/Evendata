<html>
<head>
	<title>Evendata</title>
	<link rel="stylesheet" href="css/setting.css">
	<link rel="stylesheet" href="css/login.css">
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
	<center>
	<h2>Change Password</h2>
	<br><br>
	<div class="login-block">
	<form action="change_pass_proc.php" method="post">
		<input type="password" value="" placeholder="Old Password" id="password" name="old_password" required="required"/>
	<br><br>
		<input type="password" value="" placeholder="New Password" id="password" name="new_password" required="required"/>
	<br><br>
		<input type="password" value="" placeholder="Re-enter Password" id="password" name="reenter_password" required="required"/>
	<br><br>	
	<button>Submit</button>
	</form>
	</div>
	</center>
</div>
</body>
</html>