<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='css/create_1.css' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="css/styles.css">
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/float.css">

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link href='css/create_1.css' rel='stylesheet' type='text/css'>
 <link rel="stylesheet" href="css/styles.css">

<title>Create Event</title>

</head>

<body>
    <script src="js/main.js"></script>
<div id="mySidenav" class="sidenav">
    <a href="#" id="closebtn" class="closebtn" onclick="closeNav()">&times;</a>
    <ul>
        <li id="Calendar"><a href="calendar.html">Calendar</a></li>
        <li id="Register"><a href="#">Register</a></li>
        <li id="History"><a href="#">History</a></li>
        <li id="Settings"><a href="#">Settings</a></li>
        <li id="About"><a href="#">About us</a></li>
    </ul>
</div>

<div id="main">
    <span id="sideDrawer" style="font-size:30px;cursor:pointer" onmouseover="openNav()">&#9776;</span>
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