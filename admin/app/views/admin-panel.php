<?php



$values = $_POST;


?>



<section class="container">

    <h1>Producten invoeren</h1>

    <form class="signup-form" method="post" action="../app/src/adminDB.php">
        <input type="text" name="productName" placeholder="Productnaam">
        <input type="number" name="quantity" placeholder="Hoeveelheid">

        <button type="submit" name="submit">Product invoeren</button>
    </form>


</section>
