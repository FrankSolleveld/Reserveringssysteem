<?php

require_once '../app/src/database.php';

$values = $_POST;

//Haal producten op uit db
$query = "SELECT * FROM products";
$result = mysqli_query($db, $query);

//Zet de rewsultaten in een array
$availableProducts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $availableProducts[] = $row;
}

//Sluit verbinding
mysqli_close($db);

?>
<!-- jQuery heeft een kalender ingebouwd. Dus met deze regels code krijg ik een eigen kalender zonder dat ik dat hoef te programmeren. -->
<script>
    $( function() {
        $( "#fromDate" ).datepicker();
        $( "#toDate" ).datepicker();
    } );

    function addProduct() {

        // Deze functie moet ervoor zorgen dat je nog een product kan toevoegen.

        console.log("Button is geklikt.");

        document.getElementById('productOption').style.display = "block";

        console.log("getElementById is uitgevoerd!");

    }
</script>
<div id="viewport">

<div class="mainframe">

    <h3 class="h3Class">Wat wilt u reserveren?</h3><br>

    <div class="leftPanel ">

        <p>Selecteer welk product u wilt reserveren.</p>

        <select id="producten" name="selected-product" method="post">

            <!-- Option wordt meer naarmate er meerdere producten komen. -->
            <?php foreach ($availableProducts as $product) {

                ?> <option name="product"><?= $product['name']; ?> - <?= $product['quantity']; ?> beschikbaar - €<?= $product['price']; ?> per dag </option>
                <?php

            } ?>


        </select>

        <!-- De button moet de functie uitvoeren die erboven gedeclareerd staat. -->
        <button onclick="addProduct()">Nog een product toevoegen</button>

        <p>Hoe lang zou u het gereserveerde product willen gebruiken?</p>

        <form method="post">
            <p>Van: <input type="text" id="fromDate" name="fromDate"></p>
            <p>Tot: <input type="text" id="toDate" name="toDate"> </p>
        </form>

        <section id="pricing">

            <p>De kosten komen neer op:</p>

        </section>
    </div>

    <div class="rightPanel">
        <p>Vul hieronder uw gegevens in.</p>
        <form method="post" action="../app/src/reservation.php">
            <input type="text" name="firstName" placeholder="Voornaam">
            <input type="text" name="lastName" placeholder="Achternaam"><br>
            <input type="text" name="zip" placeholder="2252 BM">
            <input  id="email-field" type="email" name="email" placeholder="info@example.com">
            <input type="number" name="phonenumber" placeholder="Telefoonnummer">
            <button type="submit">Verzenden</button>
        </form>

    </div>

</div>
</div>

