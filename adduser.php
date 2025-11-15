<?php
    print_r($_POST);
    include_once("connection.php");
    $username=$_POST["surname"].".".$_POST["forename"][0];
    //$username="bob";
    if($_POST["role"]=="pupil"){
        $role=0;
    }else{
        $role=1;
    }
   
    $stmt1= $conn->prepare("INSERT INTO tblusers
    (UserID,Username, Surname, Forename, Password, Year, Balance, Role)
    VALUES
    (NULL,:Username, :Surname, :Forename, :Password, :Year, :Balance, :Role)
    ");
    $stmt1->bindParam(":Username",$username);
    $stmt1->bindParam(":Surname",$_POST["surname"]);
    $stmt1->bindParam(":Forename",$_POST["forename"]);
    $stmt1->bindParam(":Password",$_POST["password"]);
    $stmt1->bindParam(":Year",$_POST["year"]);
    $stmt1->bindParam(":Balance",$_POST["balance"]);
    $stmt1->bindParam(":Role",$role);
    $stmt1->execute();
?>