<?php

require_once '../app/src/database.php';

$values = $_POST;

//Haal producten op uit db
$result = DB::query("SELECT * FROM products");

?>
<!-- jQuery heeft een kalender ingebouwd. Dus met deze regels code krijg ik een eigen kalender zonder dat ik dat hoef te programmeren. -->
<script>
    $( function() {
        $('#fromDate').datepicker({ minDate:'+1d', maxDate: '+1m', dateFormat: 'dd/mm/yy'});
        $( '#toDate' ).datepicker({ minDate:'+2d', maxDate: '+1m', dateFormat: 'dd/mm/yy'});
    } );

</script>

<div id="viewport">

<div class="mainframe">

    <h3 class="h3Class">Wat wilt u reserveren?</h3><br>

    <div class="leftPanel ">

        <p>Selecteer welk product u wilt reserveren.</p>
        <form method="post" action="../app/src/reservation.php" autocomplete="on">
        <select id="producten" name="selected-product" method="post">
            <option>Klik hier voor beschikbare producten:</option>

            <!-- Option wordt meer naarmate er meerdere producten komen. -->
            <?php foreach ($result as $product) {

                ?> <option value="<?= $product['productID'] ?>"><?= $product['productName']; ?> - <?= $product['quantity']; ?> beschikbaar - €<?= $product['price']; ?> per dag excl. administratiekosten.</option>
                <?php

            } ?>


        </select>

        <p>Hoe lang zou u het gereserveerde product willen gebruiken?</p>

            <p>Van:<input type="text" id="fromDate" name="fromDate"> </p>
            <p>Tot: <input type="text" id="toDate" name="toDate"> </p>
<!--            <button type="submit">Data invoeren</button>-->
<!--        </form>-->


        <section id="pricing">

            <!-- De data dient hier direct gevalideert te worden, maar hoe doen we dat? -->
            <!-- toDate - fromDate = aantal dagen. Het aantal dagen x dagprijs is totale kosten -->
<!--            <p>U reserveert het product --><?//= $numDays  ?><!-- X dagen. De kosten komen neer op: <br><br> Dagtarief: € --><?//= $product['price']; ?><!--</p>-->
            <p>U kunt meer info over de beschikbare producten vinden op GebruikteLaptops.nl</p>
            <p>U betaalt minimaal voor een dag. Daarnaast gelden er administratiekosten van €12,50 die eenmalig verrekend worden.</p>
            <p>Wij zullen na uw reservering contact met u opnemen over de nota.</p>

        </section>
    </div>

    <div class="rightPanel">
        <p>Vul hieronder uw gegevens in.</p>
<!--        <form method="post" action="../app/src/reservation.php">-->
            <input id="form-firstname" type="text" name="firstName" style="<?php if($_SESSION['error-firstName'] == 1){ echo "background:red;"; } ?>" value="<?php echo $_SESSION['firstName']; ?>" placeholder="Voornaam">
            <input id="form-lastname" type="text" name="lastName" placeholder="Achternaam"><br>
            <input id="form-zip" type="text" name="zip" placeholder="1234AB">
            <input id="form-housenumber" type="number" name="housenumber" placeholder="Huisnummer">
            <input id="form-streetaddress" type="text" name="streetaddress" placeholder="Adres" disabled>
            <input id="form-city" type="text" name="city" placeholder="Woonplaats" disabled>
            <input id="form-email" type="email" name="email" placeholder="info@voorbeeld.com"><br>
            <input id="form-phone" type="number" name="phonenumber" placeholder="0612345678">

            <input type="submit" id="form-submit" name="submit">
            <span id="postcodeapi-error"></span>
            <p class="form-message"> </p>
        </form>

    </div>

</div>
</div>

<script>
    // Adding event listener for zip
    var zip = document.getElementById('form-zip');
    zip.addEventListener("keyup", checkData);

    // Adding event listener for housenumber
    var housenumber = document.getElementById('form-housenumber');
    housenumber.addEventListener("keyup", checkData);

    // Setting variable for timeout
    var timeOut = setTimeout(function(){});

    function checkData(){
        // Don't start the function unless user stopped typing.
        clearTimeout(timeOut);
        timeOut = setTimeout(function(){

            console.log(zip.value);

            // Check voor lege velden.
            if ( zip.value === "" || housenumber.value === "" ) {

                console.log("De velden zijn leeg kil.");
                return;

            }

            // Voer de functie uit voor het opzoeken van de stat en straatnaam.
            var settings = {
                "async": true,
                "crossDomain": true,
                "url": "https://api.postcodeapi.nu/v2/addresses/?postcode="+zip.value+"&number="+housenumber.value,
                "method": "GET",
                "headers": {
                    "x-api-key": "wAmF6CUMWn4P1ksMkHI68asLLP4Mtv90atbAuKKx",
                    "accept": "application/hal+json"
                }
            };

            $.ajax(settings).done(function (response) {
                // Response wordt opgeslagen in console.log en vervolgens wordt het in de velden geplaatst.
                console.log(response);
                document.getElementById('form-streetaddress').value = response._embedded.addresses[0].street;
                document.getElementById('form-city').value = response._embedded.addresses[0].city.label;
            });

        }, 600);
    }
</script>