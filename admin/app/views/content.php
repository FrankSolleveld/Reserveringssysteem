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
<!-- Header waar login komt te staan -->
<header>
    <nav>
        <div class="main-wrapper">

            <ul>
                <li> <a href="index.php">Home</a></li>
            </ul>

            <div class="nav-login">

                <form>
                    <input type="text" name="uid" placeholder="Gebruikersnaam / E-mail">
                    <input type="password" name="pwd" placeholder="Wachtwoord">

                    <button type="submit" name="submit">Log in</button>
                </form>
                <a href="signup.php">Registreren</a>
            </div>

        </div>
    </nav>
</header>
<div id="viewport">


</div>

