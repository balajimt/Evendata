<!DOCTYPE html>
<html>
<head>
<link href='css/font.css' rel='stylesheet' type='text/css'>
<link href='css/login.css' rel='stylesheet' type="text/css">
<meta charset="UTF-8">
<title>EvenData Login</title>
</head>

<?php
    if(isset($_COOKIE["user"])){
        echo "Comes here";
        echo $_COOKIE["user"];
        header("Location:index.php");
        exit;
    }
?>

    
<body>

<div class="logo"></div>
<div class="login-block">
	<form action= "loginprocess.php" method="post">
    <h1>Login</h1>
    <input type="text" value="" placeholder="Username" id="username" name="username" required="required"/>
    <input type="password" value="" placeholder="Password" id="password" name="password" required="required"/>
    <button type="submit">Submit</button>
	</form>
</div>
</body>

</html>