<!DOCTYPE HTML>
<html>
<head>          
    <title>Food</title>
</head>

<body>
    <form action="addfood.php" method="POST">
        Name:<input type="text" name="name"><br>
        Description:<input type="text" name="description"><br>
        Category:
        <select name="category">
            <option value="snack">Snack</option>
            <option value="drink">Drink</option>
            <option value="sandwich">Sandwich</option>
            
          </select>
          <br>
        Price :<input type="text" name="price"><br>
     
        <input type="submit" value="Add Food">
    </form>
    <?php
        include_once("connection.php");
        $stmt=$conn->prepare("SELECT * FROM tblfood ORDER BY Category, Name");
        $stmt->execute();
        while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            //print_r($row);
            echo($row["Name"]." ".$row["Description"]." ".$row["Price"]);
            echo("<br>");
        }
    ?>

</body>
</html>