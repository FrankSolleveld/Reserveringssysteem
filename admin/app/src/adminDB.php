<?php
if(isset($_POST['submit'])) {
// Connectie met db maken
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

// mysqli_real_escape_string --> zodat users geen code erin kunnen stoppen
    $productName = mysqli_real_escape_string($link, $_POST['productName']);
    $quantity = mysqli_real_escape_string($link, $_POST['quantity']);

// SQL Query aanmaken en uitvoeren
    $sql = "INSERT INTO products (id, name, quantity) VALUES ('$id', '$productName', '$quantity');";
    $result = mysqli_query($link, $sql)
    or die('Error ' . mysqli_error($link) . ' with query ' . $query);

// DB-connectie sluiten
    mysqli_close($db);

    header("Location:../../public/index.php");
    exit();
};
