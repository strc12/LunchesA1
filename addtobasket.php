<?php
    session_start();
    print_r($_POST);
    include_once("connection.php");
    if(!isset($_SESSION["orderinprogress"])){
        $dateoforder=date_create()->format('Y-m-d H:i:s');
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
        $_SESSION["orderinprogress"]=1;
        $_SESSION["lastorderid"]=$conn->lastInsertId();#stores the last order id created
        print_r($_SESSION["lastorderid"]);
    }#add item to basket table
        $stmt1= $conn->prepare("INSERT INTO tblbasket
        (OrderID,FoodID,Quantity)
        VALUES
        (:orderid,:foodid, :quantity)
        ");
        $stmt1->bindParam(":orderid",$_SESSION["lastorderid"]);
        $stmt1->bindParam(":foodid",$_POST["foodid"]);
        $stmt1->bindParam(":quantity",$_POST["qty"]);
        $stmt1->execute();
?>