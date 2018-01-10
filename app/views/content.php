<?php

require_once '../app/src/database.php';

$values = $_POST;

//Haal producten op uit db
$query = "SELECT * FROM products";
$result = mysqli_query($db, $query);

//Zet de resultaten in een array
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
        $('#fromDate').datepicker({ minDate:0, maxDate: '+1m', dateFormat: 'dd/mm/yy'});
        $( '#toDate' ).datepicker({ minDate:'+1d', maxDate: '+1m', dateFormat: 'dd/mm/yy'});
    } );
</script>
<div id="viewport">

<div class="mainframe">

    <h3 class="h3Class">Wat wilt u reserveren?</h3><br>

    <div class="leftPanel ">

        <p>Selecteer welk product u wilt reserveren.</p>

        <select id="producten" name="selected-product" method="post">
            <option>Klik hier voor beschikbare producten:</option>

            <!-- Option wordt meer naarmate er meerdere producten komen. -->
            <?php foreach ($availableProducts as $product) {

                ?> <option name="product"><?= $product['name']; ?> - <?= $product['quantity']; ?> beschikbaar - €<?= $product['price']; ?> per dag </option>
                <?php

            } ?>


        </select>

        <p>Hoe lang zou u het gereserveerde product willen gebruiken?</p>


        <form method="post" action="../app/src/dateValidation.php">
            <p>Van:<input type="text" id="fromDate" name="fromDate"> </p>
            <p>Tot: <input type="text" id="toDate" name="toDate"> </p>
            <button type="submit">Data invoeren</button>
        </form>


        <section id="pricing">

            <!-- De data dient hier direct gevalideert te worden, maar hoe doen we dat? -->
            <!-- toDate - fromDate = aantal dagen. Het aantal dagen x dagprijs is totale kosten -->
            <p>U reserveert het product <?= $numDays  ?> X dagen. De kosten komen neer op: <br><br> Dagtarief: € <?= $product['price']; ?></p>


        </section>
    </div>

    <div class="rightPanel">
        <p>Vul hieronder uw gegevens in.</p>
        <form method="post" action="../app/src/reservation.php">
            <input type="text" name="firstName" placeholder="Voornaam">
            <input type="text" name="lastName" placeholder="Achternaam"><br>
            <input type="text" name="zip" placeholder="1234 AB">
            <input  id="email-field" type="email" name="email" placeholder="info@voorbeeld.com">
            <input type="number" name="phonenumber" placeholder="0612345678">
            <button type="submit">Verzenden</button>
        </form>

    </div>

</div>
</div>

