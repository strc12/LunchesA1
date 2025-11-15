<!DOCTYPE HTML>
<html>
<head>          
    <title>Add users</title>
</head>

<body>
    <form action="adduser.php" method = "POST">
        Surname: <input type="text" name="surname"><br>
        Forename: <input type="text" name="forename"><br>
        Password: <input type="password" name="password"><br>
        Year: <input type="number" name="year"><br>
        Initial Balance: <input type="number" name="balance"><br>
        Role: <br>
        <input type="radio" name="role" value="pupil" checked>pupil<br>
        <input type="radio" name="role" value="admin" >Admin<br>
        <input type="submit" value="Add user"><br>
    </form>

    <?php
        include_once("connection.php");
        $stmt1= $conn->prepare("SELECT * FROM tblusers");
        $stmt1->execute();
        while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
        {
            print_r($row);
        }
    ?>
</body>
</html>