<!DOCTYPE html>
<html>
<head>
<link href='css/font.css' rel='stylesheet' type='text/css'>
<link href='css/login.css' rel='stylesheet' type='text/css'>
<meta charset="UTF-8">

<title>EvenData Signup</title>
</head>

<?php
    if(isset($_COOKIE["user"])){
        header("Location:index.php");
        exit;
    }
?>

<body>
    

    <div class="logo"></div>
    <center>
    <div>
        <p class="successnote">
        <?php
        echo  $_REQUEST['success'];
?>
        </p>
    </div>
    </center>
    <div class="login-block">
	<form action= "loginprocess.php" method="post">
    <h1>Login</h1>
    <input type="text" value="" placeholder="Username" id="username" name="username" required="required"/>
    <input type="password" value="" placeholder="Password" id="password" name="password" required="required"/>
    <button type="submit">Submit</button>
	</form>
</div>
    <br>
    <br>
    <div id="footernote"><center>&copy; 2017</center></div>
</body>

</html>