<?php
    //header("location: index.php");
    session_start();#start session if you want to use session variables
    print_r($_POST);
    array_map ("htmlspecialchars",$_POST);//santitises inputs so no HTML injection
    include_once("connection.php");
    $stmt1= $conn->prepare("SELECT * FROM tblusers WHERE Username=:Username");
    $stmt1->bindParam(":Username", $_POST["username"]);
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        $hashed=$row["Password"];
        $attempt=$_POST["password"];
        echo ($hashed.$attempt);
        if (password_verify($attempt,$hashed)){
            echo("valid password");
            $_SESSION["firstname"]=$row["Forename"];
            $_SESSION["loggedinuser"]=$row["UserID"];
            $_SESSION["role"]=$row["Role"];
        }
        else{
            echo("invalid password");
        }
        
        
    }
    ?>