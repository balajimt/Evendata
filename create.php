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

$username = $_COOKIE["user"];
$sql="SELECT * from admin where adminUsername='$username'";
$result=$conn->query($sql);
$row = $result->fetch_assoc();


$eventId = uniqid();
$eventname = $_POST['eventName'];   //Event Name 
$eventdate = $_POST['eventDate'];    //Event Date 
$eventtime = $_POST['eventTime'];    //Event Timings 
$eventvenue = $_POST['eventVenue'];    //Event Venue 
$eventcategory = $_POST['eventCategory'];
$eventAdmin = $username; 
$eventorganiser = $_POST['eventOrganiser'];   //Event organiser 
$eventcontact = $_POST['eventContact'];   //Event contact details 
$eventbudget = $_POST['eventBudget'];   //
$eventAbout = $_POST['eventAbout']; 
$eventlevel = $row['adminLevel']; 

//echo "eventname:" . $eventbudget;
$sql = "INSERT INTO EVENTSTATUS VALUES('$eventId','$eventname','$eventdate','$eventtime','$eventvenue','$eventcategory',$eventlevel,'$username','$eventorganiser','$eventcontact',$eventbudget,'$eventAbout')";

header("Location:successevent.php");
exit;

$conn->query($sql);
$sql = "SELECT * FROM EVENTSTATUS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
      //output data of each row
    while($row = $result->fetch_assoc()) {
}
}
else {
    echo "0 results";
}

$conn->close();
?>
