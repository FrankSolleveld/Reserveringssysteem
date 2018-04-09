<?php

if(isset($_POST['submit'])) {

// Connectie met db maken
    require_once 'database.php';

    if ($db->connect_error) {

        die("Connection failed: " . $db->connect_error);
        print_r("Connectie error.");

    } else {

        // mysqli_real_escape_string --> zodat users geen code erin kunnen stoppen
        $productName = mysqli_real_escape_string($db, $_POST['productName']);
        $category = mysqli_real_escape_string($db, $_POST['category']);
        $quantity = mysqli_real_escape_string($db, $_POST['quantity']);
        $price = mysqli_real_escape_string($db, $_POST['price']);
        print_r("In var geplaatst.");

        // SQL Query voorbereiden
        $query = $db->prepare( "INSERT INTO products (productName, category, price, quantity) VALUES (?, ?, ?, ?)");
        print_r("Query voorbereid");

        // Parameter wordt aan eigenschappen gebonden en de variabele wordt aan variabelen gekoppeld.
        $query->bind_param("ssii",$productName,$category, $quantity, $price);
        print_r("Parameters gezet");

        // Query uitvoeren
        $query->execute();
        print_r("Query uitgevoerd.");

        // Query afsluiten
        $query->close();
        print_r("Query afgesloten.");

        // Connectie sluiten
        $db->close();
        print_r("Database gesloten.");
        header("Location:../../public/index.php");
        exit();
    }
}