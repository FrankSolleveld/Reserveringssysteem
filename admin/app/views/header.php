<header>
    <nav>
        <div class="main-wrapper">

            <ul>
                <li><a href="index.php">Compleet IT | Admin</a></li>
            </ul>

            <div class="nav-login">

                <?php if (isset($_SESSION['u_id'])) { ?>
                    <!--   Zodra user is ingelogd, krijgt hij/zij de optie om uit te loggen.-->
                    <form action="../app/src/logout.php" method="post">
                        <button id="signOut" type="submit" name="submit">Log uit</button>
                    </form>
                <?php } else { ?>

                    <!-- Zodra er geen user is ingelogd, krijg je het inlogvenster te zien.-->
                    <form action="../app/src/login.php" method="post">
                        <input type="text" name="uid" placeholder="Gebruikersnaam / E-mail">
                        <input type="password" name="pwd" placeholder="Wachtwoord">

                        <button type="submit" name="submit">Log in</button>
                    </form>

                <?php } ?>


            </div>

        </div>
    </nav>
</header>
