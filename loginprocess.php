<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evendata";


//Cookie details
$cookie_name = "user";
$cookie_value = "John Doe";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");


// Create connection
// Object oriented approach
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];


//Checking whether the user id exists on the database
$sql = "SELECT userId FROM Users WHERE userId='$username' ";

$usernames = $conn->query($sql);
if ($usernames->num_rows == 0){
  $value = "Sorry the username'" . $username."does not exists on our database";
    header("Location:loginerror.php?error='$value'");
}



$sql = "SELECT * FROM USERS WHERE userId = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$type = $row["userType"];
if($row["userType"]=='PARTICIPANT'){
    
    $sql = "SELECT participantUsername,participantPassword FROM PARTICIPANTS WHERE participantUsername = '$username'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(password_verify($password,$row["participantPassword"])){
        
        //Cookie details for participant
        $cookie_name = "user";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Will expire after 30 days
        header("Location:index.php");
        exit;
    }
    else {
        
        //Error Page
        $value = "Invalid Password";
        echo $value;
        header("Location:loginerror.php?error='$value'");
    }
}

else if ($row["userType"]=='ADMIN'){
    
    $sql = "SELECT adminUsername,adminPassword FROM ADMIN WHERE adminUsername = '$username'";
    
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    if(password_verify($password,$row["adminPassword"])){
        
        //Cookie details for admin
        $cookie_name = "user";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); //Will expire after 30 days
        $cookie_name = "type";
        $cookie_value = "admin";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 
        header("Location:indexadmin.php");
        exit;
        
    }
    else {
        //Error Page
        $value = "Invalid Password";
        echo $value;
        header("Location:loginerror.php?error='$value'");
    }
}
$conn->close();
?>