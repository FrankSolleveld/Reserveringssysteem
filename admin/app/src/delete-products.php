<?php

require_once "database.php";

if ($db->connect_error) {
    // Als er geen verbinding tot stand gebracht kan worden, wordt het verwijder programma afgesloten.
    die("Connection failed: " . $db->connect_error);

} else {

    $productId = $_GET['id'];

    print_r($productId);

// Query voorbereiden
    $query = $db->prepare("DELETE FROM products  WHERE productID = (?)");

// Parameter wordt aan integer gebonden en de variabele wordt aan $productId gekoppeld.
    $query->bind_param("i", $productId);

// Query wordt uitgevoerd.
    $query->execute();

// Query wordt afgesloten.
    $query->close();

//Close connection
    $db->close();
//Redirect to homepage after deletion & exit script
    header("Location: ../../public/index.php");
    exit;
}