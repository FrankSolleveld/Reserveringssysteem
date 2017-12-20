<?php

require_once '../src/productDatabse.php';
$values = $_POST;

?>
<!-- CSS inladen -->
<link rel="stylesheet" type="text/css" href="../admin.css"/>

<section class="container">

    <h1>Producten invoeren</h1>

    <!-- Class is signup-form omdat het dezelfde properties gebruikt als het registreer-formulier -->
    <form class="signup-form" method="post" action="../app/src/adminDB.php">
        <input type="text" name="productName" placeholder="Productnaam">
        <input type="number" name="quantity" placeholder="Hoeveelheid">

        <button type="submit" name="submit">Product invoeren</button>
    </form>

    <!-- Dit wordt de lijst met alle beschikbare producten, dan hebben Dick en Sander een overzicht van wat we hebben -->
    <div class="productsView">
    <table>
        <thead>
        <tr>

            <th>Productnaam</th>
            <th>Quantity</th>

        </tr>
        </thead>
        <tbody>

        <?php foreach ($products as $product) { ?>
            <tr>
                <td><?= $product['name']; ?></td>
                <td><?= $product['quantity']; ?></td>

                <!--<td><a href="edit.php?id=<?= $products['id']; ?>">Edit</a></td>-->
            </tr>
        <?php } ?>

        </tbody>
    </table>
    </div>


</section>
