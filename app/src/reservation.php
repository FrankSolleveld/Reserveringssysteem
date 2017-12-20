<?php

if (isset($_POST['submit'])) {

    // Connectie maken met database

    require_once 'database.php';

    // Submitting user input into variables.
    $fromDate = mysqli_real_escape_string($db, $_POST['fromDate']);
    $toDate = mysqli_real_escape_string($db, $_POST['toDate']);
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $zip = mysqli_real_escape_string($db, $_POST['zip']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $product = $_POST['product'];

    if (empty($firstName) || empty($lastName) || empty($email) || empty($fromDate) || empty($toDate) || empty($zip) || empty($product)) {
        // Pagina wordt opnieuw geladen zodra 1 van bovenstaande velden leeg is.
        header('Location: ../../../public/index.php?signup=empty');
        print ("Niks is leeg");
        exit();
    } else {
        // Check voor gebruik van juiste karakters
        if (!preg_match("/^[a-zA-Z- \s]*$/", $firstName) || !preg_match("/^[a-zA-Z \s]*$/", $lastName)) {
            header('Location: ../../../public/index.php?signup=invalid');
            print ("Niks is fout qua tekst");
            exit();
        } else {
            // Check voor valide e-mail adres
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                header('Location: ../../../public/index.php?signup=invalidemail');
                print ("email is goed");
                exit();

            } else {

                // User in database zetten
                $sql = "INSERT INTO orders (firstName, lastName, email, zip, product, from_date, to_date) VALUES ('$firstName', '$lastName', '$email', '$zip', '$product', '$fromDate', '$toDate');";

                $result = mysqli_query($db, $sql)
                or die('Error '.mysqli_error($db).' with query '.$query);


                mysqli_close($db);
                print ("db geuploaded en connectie is gesloten");
                header('Location: ../../../public/index.php');
                exit;
            }



        }
    }
}