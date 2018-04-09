<?php


$values = $_POST;

/**if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')" ;
    $db->query($sql);
}*/

?>

<section class="main-container">
    <div class="main-wrapper">
        <h2>Registreren</h2>

        <form class="signup-form" method="post" action="../app/src/save.php">
            <input type="text" name="first" placeholder="Voornaam">
            <input type="text" name="last" placeholder="Achternaam">
            <input type="text" name="email" placeholder="E-Mail">
            <input type="text" name="uid" placeholder="Gebruikersnaam">
            <input type="password" name="pwd" placeholder="Wachtwoord">

            <button type="submit" name="submit">Aanmelden</button>
        </form>
    </div>
</section>
<div id="viewport">


</div>

