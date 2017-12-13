<?php
/**
 * Created by PhpStorm.
 * User: franksolleveld
 * Date: 15-11-17
 * Time: 15:23
 */

$values = $_POST;

/**if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')" ;
    $db->query($sql);
}*/

?>
<!-- jQuery heeft een kalender ingebouwd. Dus met deze regels code krijg ik een eigen kalender zonder dat ik dat hoef te programmeren. -->
<script>
    $( function() {
        $( "#fromDate" ).datepicker();
        $( "#toDate" ).datepicker();
    } );
</script>
<div id="viewport">

<div class="mainframe">

    <h3 class="h3Class">Wat wilt u reserveren?</h3><br>

    <div class="leftPanel ">

        <p>Selecteer welk product u wilt reserveren.</p>

        <select id="producten" name="producten">
            <!-- option moet uiteindelijk door PHP worden toegevoegd naarmate de producten toenemen -->
            <option value="null">Product</option>
            <option value="epson">Epson EB-440W</option>
            <option value=""></option>
        </select>

        <p>Hoe lang zou u het gereserveerde product willen gebruiken?</p>

        <form method="post">
            <p>Van: <input type="text" id="fromDate"></p>
            <p>Tot: <input type="text" id="toDate"></p>
        </form>
    </div>

    <div class="rightPanel">
        <p>Vul hieronder uw gegevens in.</p>
        <form method="post" >
            <input type="text" name="firstName" placeholder="Voornaam">
            <input type="text" name="lastName" placeholder="Achternaam"><br>
            <input type="number" name="zip" placeholder="2252 BM">
            <input  id="email-field" type="email" name="email" placeholder="E-mail">
            <input type="number" name="phonenumber" placeholder="Telefoonnummer">
            <!--<button type="submit">Verzenden</button>-->
        </form>

    </div>

</div>
</div>

