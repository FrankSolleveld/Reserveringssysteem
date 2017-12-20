<?php

if (isset($_POST['submit'])) {

    // Submitting user input into variables.
    $fromDate = mysqli_real_escape_string($link, $_POST['fromDate']);
    $toDate = mysqli_real_escape_string($link, $_POST['toDate']);
    $firstName = mysqli_real_escape_string($link, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($link, $_POST['lastName']);
    $zip = mysqli_real_escape_string($link, $_POST['zip']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $product = $_POST['product'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($fromDate) || empty($toDate) || empty($zip) || empty($product)) {
        // Pagina wordt opnieuw geladen zodra 1 van bovenstaande velden leeg is.
        header('Location: ../../public/index.php?signup=empty');
        exit();
    } else {
        // Check voor gebruik van juiste karakters
        if (!preg_match("/^[a-zA-Z- \s]*$/", $firstName) || !preg_match("/^[a-zA-Z \s]*$/", $lastName)) {
            header('Location: ../../public/index.php?signup=invalid');
            exit();
        } else {
            // Check voor valide e-mail adres
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../../public/index.php?signup=invalidemail');
                exit();

            }

        }
    }
}