<?php
    session_start();
    print_r($_POST);
    $dateoforder=date_create()->format('Y-m-d H:i:s');
    include_once("connection.php");
    $status="Pending";
    $stmt1= $conn->prepare("INSERT INTO tblorder
    (OrderID,Status,UserID,Orderdate)
    VALUES
    (NULL,:status, :userid, :orderdate)
    ");
    $stmt1->bindParam(":status",$status);
    $stmt1->bindParam(":userid",$_SESSION["loggedinuser"]);
    $stmt1->bindParam(":orderdate", $dateoforder);
    
    $stmt1->execute();
?>