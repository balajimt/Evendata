<!DOCTYPE html>
<html>
<head>
<link href='css/font.css' rel='stylesheet' type='text/css'>
<link href='css/create_1.css' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="css/styles.css">
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="css/float.css">

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='css/create_1.css' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="css/styles.css">
     <link rel="stylesheet" href="css/createtable.css">

<title>Create Event</title>

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
     <a href="logoutprocess.php"><img id="powerButton" src="images/power.png" onmouseover="hoverPower(this);" onmouseout="unhoverPower(this);"></a>
    <center><h2>Created Events</h2><br><br><br>
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
$sql="SELECT * from eventStatus where eventAdmin='$username'";
$result=$conn->query($sql);

if($result->num_rows>0)
{
	while($row = $result->fetch_assoc())
	{
		echo "
			<tr>
				<td>".$row["eventId"]."</td>
                <td>".$row["eventName"]."</td>
				<td>&#9742; ". $row["eventContact"]."</td>
                <td>".$row["eventAdmin"]."</td>
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
    
    <div class="container">

  <!-- Trigger the modal with a button -->

  <a href="#" class="float">
<i class="fa fa-plus my-float" data-toggle="modal" data-target="#myModal"></i>
</a>
<div class="label-container">
<div class="label-text">Create Event</div>
<i class="fa fa-play label-arrow"></i>
</div>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
 
        <div class="modal-body">
		<div class="create-block">
	    <div class="background">
        <div class="transbox">
        <form action= "create.php" method="post">
		<center><h1 class="modal-title">Create Event</h1></center>
 
        <input type="text" value="" placeholder="Event Name" id="eventName" name="eventName" required="required"/>

        <input type="date" value="" placeholder="Event Date" id="eventDate" name="eventDate" required="required"/>
		
		<input type="time" value="" placeholder="Event Time"  id="eventTime" name="eventTime" required="required"/>

        <input type="text" value="" placeholder="Event Venue" id="eventVenue" name="eventVenue" required="required"/>
		
		<select name="eventCategory" background-image= "url('..images/dropdown.png')" required >
		
		<option value="" disabled selected>Event Category</option>
		
		<option value="event">Event</option>

		<option value="workshop">Workshop</option>

		</select>

        <input type="text" value="" placeholder="Event Organiser" id="eventOrganiser" name="eventOrganiser" required="required"/>

		<input type="number"  maxlength="10" value="" placeholder="Organisers Contact" id="eventContact" name="eventContact" required="required"/>
		
        <input type="number" value="" placeholder="Event Budget" id="eventBudget" name="eventBudget" required="required"/>

		<input type="textbox" value="" placeholder="About the Event" id="eventAbout" name="eventAbout" required="required"/>
        

        <button type="submit">Submit</button>
        </form>
		</div>
		</div>
        </div>
        </div>
     
      
      </div>
      
    </div>
  </div>
  
</div>

</body>

</html>