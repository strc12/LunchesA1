<?php
    #create varialbes with server details on
    $servername="localhost";
    $username="root";
    $password="password";

    $conn=new PDO("mysql:host=$servername",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sql="CREATE DATABASE IF NOT EXISTS Lunchesa1";
    $conn->exec($sql);
    $sql="USE Lunchesa1";
    $conn->exec($sql);
    echo("DB made");
    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblusers;
    CREATE TABLE tblusers
    (UserID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(20) NOT NULL,
    Surname VARCHAR(20) NOT NULL,
    Forename VARCHAR(20) NOT NULL,
    Password VARCHAR(200) NOT NULL,
    Year INT(2) NOT NULL,
    Balance DECIMAL (15,2) NOT NULL,
    Role TINYINT(1));
    ");
    $stmt1->execute();
    //add in some default data
    $hashedpassword=password_hash("password",PASSWORD_DEFAULT);
    echo($hashedpassword);
    $stmt1= $conn->prepare("INSERT INTO tblusers
    (UserID,Username, Surname, Forename, Password, Year, Balance, Role)
    VALUES
    (NULL,'cunniffe.r','Cunniffe', 'Rob', :Password, 12, 10.50, 1),
    (NULL,'arnold.k','Arnold', 'Kev', :Password, 12, 10.50, 0)
    ");
    
    $stmt1->bindParam(":Password",$hashedpassword);
    
    $stmt1->execute();

    $stmt1= $conn->prepare("DROP TABLE IF EXISTS tblfood;
    CREATE TABLE tblfood
    (FoodID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(40) NOT NULL,
    Description VARCHAR(200) NOT NULL,
    Category VARCHAR(20) NOT NULL,
    Price DECIMAL (15,2) NOT NULL);
    ");
    $stmt1->execute();
    
    $stmt1=$conn->prepare("INSERT INTO tblfood 
    (FoodID,Name,Description,Category,Price)
    VALUES
    (NULL,'Coke','black stuff','Drink',1.85),
    (NULL,'Pepsi','black stuff','Drink',1.85),
    (NULL,'cheese and pickle sandwich','dodgy food','Sandwich',3.85),
    (NULL,'cheese sandwich','boring','Sandwich',3.5),
    (NULL,'Olives','mediterranean things','Snack',0.85),
    (NULL,'Nachos','mexican crisps','Snack',2.85)
    ");
    
    
    $stmt1->execute();
    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblorder;
    CREATE TABLE tblorder
    (OrderID INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    Status  VARCHAR(20) NOT NULL,
    UserID INT(4) NOT NULL,
    Orderdate DATETIME
    );
    ");
    $stmt1->execute();
    echo("order table made");

    $stmt1=$conn->prepare("DROP TABLE IF EXISTS tblbasket;
    CREATE TABLE tblbasket
    (OrderID INT(4) NOT NULL,
    Quantity  INT(2) DEFAULT 1,
    FoodID INT(4) NOT NULL,
    PRIMARY KEY (OrderID, FoodID)
    );
    ");
    $stmt1->execute();
    echo("basket table made");
?>