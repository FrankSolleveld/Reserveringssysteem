<?php
if(isset($_POST['submit'])) {
// Connectie met db maken
    require_once 'database.php';

// mysqli_real_escape_string --> zodat users geen code erin kunnen stoppen
    $productName = mysqli_real_escape_string($db, $_POST['productName']);
    $category = mysqli_real_escape_string($db, $_POST['category']);
    $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
    $price = mysqli_real_escape_string($db, $_POST['price']);

// SQL Query aanmaken en uitvoeren
    $sql = "INSERT INTO products (name, category, quantity, price) VALUES ('$productName', '$category', '$quantity', '$price');";
    $result = mysqli_query($db, $sql)
    or die('Error ' . mysqli_error($db) . ' with query ' . $query);

// DB-connectie sluiten
    mysqli_close($db);

    header("Location:../../public/index.php");
    exit();
};
