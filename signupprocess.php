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


$username = $_POST['username'];
$password = password_hash($_POST['password'],PASSWORD_BCRYPT);
$class = $_POST['class'];
$roll = $_POST['roll'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];


//Checking whether a user already exits on the database
$sql = "SELECT userId FROM Users WHERE userId='$username' ";
$usernames = $conn->query($sql);
if ($usernames->num_rows > 0){
 $value = "Username already exists on the database";
  header("Location:signuperror.php?error='$value'");
}

$sql = "INSERT INTO USERS(userId) VALUES('$username')";
$conn->query($sql);

$sql = "INSERT INTO PARTICIPANTS VALUES('$username','$password','$class','$roll',$mobile,'$email')";
$conn->query($sql);

$sql = "SELECT * FROM USERS";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
      // output data of each row
   $value = "Your account has been successfully created";
  header("Location:signupsuccess.php?success='$value'");
}

else {
    echo "0 results";
    $value = "There was some error in signing up";
  header("Location:signuperror.php?error='$value'");
    
}

$conn->close();
?>
