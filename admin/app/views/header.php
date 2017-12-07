
<?php

// Start de sessie.
    session_start();

?>



<header>
    <nav>
        <div class="main-wrapper">

            <ul>
                <li> <a href="index.php">Home</a></li>
            </ul>

            <div class="nav-login">

                <?php

                if(isset($_SESSION['u_id'])) {

                    // Zodra user is ingelogd, krijgt hij/zij de optie om uit te loggen.
                   echo '<form action="../src/logout.php" method="post">
                    
                            <button type="submit" name="submit">Log uit</button>
                    
                        </form>';

                } else {

                    // Zodra er geen user is ingelogd, krijg je het inlogvenster te zien.
                    echo '<form action="../app/src/login.php" method="post">
                            <input type="text" name="uid" placeholder="Gebruikersnaam / E-mail">
                            <input type="password" name="pwd" placeholder="Wachtwoord">

                            <button type="submit" name="submit">Log in</button>
                          </form>';

                }

                ?>



            </div>

        </div>
    </nav>
</header>
