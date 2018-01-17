<?php
require_once '../app/src/database.php';

//Pak data uit database
// Query voor overzichtslijst
$query = "SELECT * FROM products";

$result = mysqli_query($db, $query)
    or die('Error: '.mysqli_error($db));


//Loop through the result to create a custom array
$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

// Query voor reserveringen
$orderQuery = "SELECT * FROM orders";

$orderResult = mysqli_query($db, $orderQuery)
    or die('Error: '.mysqli_error($db));

// Array voor reserveringen
$orders = [];
while ($ordersRow = mysqli_fetch_assoc($orderResult)){
    $orders[] = $ordersRow;
}

//Close connection
mysqli_close($db);
?>
<!-- CSS inladen -->
<link rel="stylesheet" type="text/css" href="../adminpage.css"/>

<section class="container">
    <div class="lists">
    <div class="register-product">
    <h1>Producten invoeren</h1>

    <!-- Class is signup-form omdat het dezelfde properties gebruikt als het registreer-formulier -->
    <form class="register-form" method="post" action="../app/src/adminDB.php">
        <input type="text" name="productName" placeholder="Productnaam">
        <input type="text" name="category" placeholder="Categorie: Laptop etc.">
        <input type="number" name="quantity" placeholder="Hoeveelheid">
        <input type="number" name="price" placeholder="Prijs per dag in euro's">

        <button type="submit" name="submit">Product invoeren</button>
    </form>
    </div>
    <!-- Dit wordt de lijst met alle beschikbare producten, dan hebben Dick en Sander een overzicht van wat we hebben -->

    <div class="products-view">
        <h1>Overzichtslijst</h1>
    <table>
        <thead>
        <tr>

            <th>Product ID</th>
            <th>Productnaam</th>
            <th>Categorie</th>
            <th>Quantity</th>
            <th>Prijs per dag in €</th>
            <th>Edit</th>

        </tr>
        </thead>
        <tbody>

        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?= $product['id']; ?></td>
                <td><?= $product['productname']; ?></td>
                <td><?= $product['category']; ?> </td>
                <td><?= $product['quantity']; ?></td>
                <td><?= $product['price'];?></td>
                <td><a href="../app/views/edit-products.php?id=<?= $product['id']; ?>">Edit</a></td>
                <!--<td><a href="edit.php?id=<?= $products['id']; ?>">Edit</a></td>-->
            </tr>
        <?php } ?>

        </tbody>
    </table>
    </div>
    </div>
    <div class="orders-view">
        <h1>Reserveringen</h1><br>
        <table>
            <thead>
            <tr>

                <th>Klantnaam</th>
                <th>Product ID</th>
                <th>Van</th>
                <th>Tot</th>
                <th>E-mail</th>
                <th>Telefoonnummer</th>
                <th>Order verwijderen</th>

            </tr>
            </thead>
            <tbody>

            <?php foreach ($orders as $order) { ?>
                <tr>

                    <td><?= $order['lastName']; ?></td>
                    <td><?= $order['product']; ?> </td>
                    <td><?= $order['from_date']; ?></td>
                    <td><?= $order['to_date']; ?></td>
                    <td><?= $order['email']; ?></td>
                    <td><?= $order['phonenumber']; ?></td>
                    <td><a href="../app/views/delete-orders.php?id=<?= $order['id']; ?>">Delete</a></td>

                </tr>
            <?php } ?>

            </tbody>
        </table>
    </div>


</section>

