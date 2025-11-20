<?php
    print_r($_POST);
    include_once("connection.php");
    $stmt1= $conn->prepare("SELECT * FROM tblusers");
    $stmt1->execute();
    while ($row = $stmt1->fetch(PDO::FETCH_ASSOC))
    {
        echo($row["Forename"]." ".$row["Surname"]."<br>");
    }
    ?>