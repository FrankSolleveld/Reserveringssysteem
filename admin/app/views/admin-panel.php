<?php
require_once '../app/src/database.php';

//Pak data uit database
$query = "SELECT * FROM products";

$result = mysqli_query($db, $query)
    or die('Error: '.mysqli_error($db));


//Loop through the result to create a custom array
$products = [];
while ($row = mysqli_fetch_assoc($result)) {
    $products[] = $row;
}

//Close connection
mysqli_close($db);
?>
<!-- CSS inladen -->
<link rel="stylesheet" type="text/css" href="../admin.css"/>

<section class="container">

    <h1>Producten invoeren</h1>

    <!-- Class is signup-form omdat het dezelfde properties gebruikt als het registreer-formulier -->
    <form class="signup-form" method="post" action="../app/src/adminDB.php">
        <input type="text" name="productName" placeholder="Productnaam">
        <input type="number" name="quantity" placeholder="Hoeveelheid">
        <input type="number" name="price" placeholder="Prijs per dag in euro's">

        <button type="submit" name="submit">Product invoeren</button>
    </form>

    <!-- Dit wordt de lijst met alle beschikbare producten, dan hebben Dick en Sander een overzicht van wat we hebben -->
    <div class="productsView">
    <table>
        <thead>
        <tr>

            <th>Productnaam</th>
            <th>Quantity</th>
            <th>Prijs per dag in €</th>

        </tr>
        </thead>
        <tbody>

        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?= $product['name']; ?></td>
                <td><?= $product['quantity']; ?></td>
                <td><?= $product['price'];?></td>
                <!--<td><a href="edit.php?id=<?= $products['id']; ?>">Edit</a></td>-->
            </tr>
        <?php } ?>

        </tbody>
    </table>
    </div>


</section>
