<?php

// Connectie maken met database

$user = 'root';
$password = 'root';
$db = 'producten';
$host = 'localhost';
$port = 8889;

$link = mysqli_init();
$success = mysqli_real_connect(
    $link,
    $host,
    $user,
    $password,
    $db,
    $port
);

//Pak data uit databse
$query = "SELECT * FROM products";
$result = mysqli_query($link, $query);

//Loop through the result to create a custom array
$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

//Close connection
mysqli_close($db);