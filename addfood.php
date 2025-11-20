<?php
header("location: food.php");

include_once("connection.php");//import equivalent!

try{
    $stmt=$conn->prepare("INSERT INTO tblfood 
    (FoodID,Name,Description,Category,Price)
    VALUES
    (NULL,:Name,:Description,:Category,:Price)
    ");
    $stmt->bindParam(":Name", $_POST["name"]);
    $stmt->bindParam(":Description", $_POST["description"]);
    $stmt->bindParam(":Category", $_POST["category"]);
    $stmt->bindParam(":Price", $_POST["price"]);
    
    $stmt->execute();
}
catch(PDOException $e)
{
    echo("error: " . $e->getMessage());
}



?>