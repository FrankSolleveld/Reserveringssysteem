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
<div id="viewport">

<div class="mainframe">

    <h3 class="h3Class">Wat wilt u reserveren?</h3><br>

    <div class="leftPanel ">

        <p>Selecteer welk product u wilt reserveren.</p>
        <ul>
            <li>Epson Beamer, 6 beschikbaar.</li>
            <li>Iets anders, namelijk: <form><input type="text" name="differentProduct" placeholder="product" ></form></li>
        </ul>

        <p>Hoe lang zou u het gereserveerde product willen gebruiken?</p>

        <form method="post">
            <input type="date" name="firstDate" placeholder="24-04-2017">
            <input type="date" name="lastDate" placeholder="30-04-2017">
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

