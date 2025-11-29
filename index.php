<!DOCTYPE HTML>
<html>
<head>          
    <title>Packed Lunches</title>
</head>

<body>
    <?php
        session_start();
        //print_r($_SESSION);
        if (isset($_SESSION["loggedinuser"])){
            echo("Hello ".$_SESSION["firstname"]);
        }
    ?>
    <h1>Main Page</h1>
    <a href="users.php"> Add user</a><br>
    <a href="food.php"> Add food</a><br>
    <a href="buyfood.php"> Buy food</a><br>
    <a href="login.php"> Login</a><br>
    <a href="logout.php"> Logout</a><br>
</body>
</html>