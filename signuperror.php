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
        <p class="errornote">
        <?php
        echo  $_REQUEST['error'];
?>
        </p>
    </div>
    </center>
    <div class="login-block">
        <form action= "signupprocess.php" method="post">
        <h1>Signup</h1>
        <input type="text" value="" placeholder="Username" id="username" name="username" required="required"/>

        <input type="password" value="" placeholder="Password" id="password" name="password" required="required"/>

        <input type="text" value="" placeholder="Department" id="class" name="class" required="required"/>

        <input type="text" value="" placeholder="Roll" id="roll" name="roll" required="required"/>

        <input type="email" value="" placeholder="Email" id="email" name="email" required="required"/>

        <input type="number"  maxlength="10" value="" placeholder="Mobile" id="mobile" name="mobile" required="required"/>

        <button type="submit">Submit</button>
        </form>
    </div>
    <br>
    <br>
    <div id="footernote"><center>&copy; 2017</center></div>
</body>

</html>