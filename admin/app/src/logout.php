<?php

// Zodra user op 'uitloggen' heeft geklikt.
if (isset($_POST['submit'])){
    // Sessie moet eerst gestart worden om gestopt te worden.
    session_start();
    // Alle sessies uitschrijven.
    session_unset();
    // Alle sessies vernietigen.
    session_destroy();
    // User wordt gelinkt naar de homepage.
    header("Location:../../public/index.php");
    exit();

}