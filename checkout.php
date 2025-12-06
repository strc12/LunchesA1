<!DOCTYPE HTML>
<html>
<head>          
    <title>Checkout</title>
</head>
<?php
    session_start();
    include_once("connection.php");
    $stmt1=$conn->prepare("SELECT * FROM tblbasket WHERE OrderID=:orderid ");
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