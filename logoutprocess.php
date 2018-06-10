<html>
    <head>
        <title>
            Logout
        </title>
    </head>
<body>
    <?php
    echo $_COOKIE["user"];
    setcookie('user', false, time() - 60*100000, '/');
    if(isset($_COOKIE["type"])){
        setcookie('type', false, time() - 60*100000, '/');
    }
    header("Location:login.php");  
    exit; 
    ?>
</body>
</html>