<?php
    #delete the session variable to reset the order in progress
    session_start();
    unset($_SESSION["orderinprogress"]);
    #update order status to paid
    include_once("connection.php");
    $status="Paid";         

    $stmt=$conn->prepare("UPDATE tblorder SET Status=:status WHERE OrderID=:orderid");
    $stmt->bindParam(":status",$status);    
    $stmt->bindParam(":orderid",$_SESSION["lastorderid"]);
    $stmt->execute();
    echo("Order Paid Successfully");
?>
