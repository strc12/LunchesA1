<!DOCTYPE HTML>
<html>
<head>          
    <title>Checkout</title>
</head>
<?php
    session_start();
    include_once("connection.php");
    #use a join query to get food names from food table
    #created aliases for ease of use
    $stmt1=$conn->prepare("SELECT tblbasket.Quantity as qty,tblfood.Name as FN FROM tblbasket 
    JOIN tblfood ON tblbasket.FoodID=tblfood.FoodID
    WHERE OrderID=:orderid ");
    $stmt1->bindParam(":orderid",$_SESSION["lastorderid"]);
    $stmt1->execute();
    
    while($row=$stmt1->fetch(PDO::FETCH_ASSOC))
        {
            print_r($row);
        }
    ?>
<body>
    

</body>
</html>