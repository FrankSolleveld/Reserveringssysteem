<?php

if (isset($_POST['submit'])) {

    // Connectie maken met database

    require_once 'database.php';

    // Submitting user input into variables.
    $product = mysqli_real_escape_string($_POST['selected-product']);
    $fromDate = mysqli_real_escape_string($_POST['fromDate']);
    $toDate = mysqli_real_escape_string($_POST['toDate']);
    $firstName = mysqli_real_escape_string($_POST['firstName']);
    $lastName = mysqli_real_escape_string($_POST['lastName']);
    $zip = mysqli_real_escape_string($_POST['zip']);
    $email = mysqli_real_escape_string($_POST['email']);



//// We geven een bericht af aan de pagina zodra er iets onjist wordt ingevoerd.
//    if (empty($firstName) || empty($lastName) || empty($email) || empty($fromDate) || empty($toDate) || empty($zip) || empty($product)) {
//
//        ?><!--<span class="form-error">Vul a.u.b. alle velden in!</span>--><?php
//
//        exit();
//    } else {
//        // Check voor gebruik van juiste karakters
//        if (!preg_match("/^[a-zA-Z- \s]*$/", $firstName) || !preg_match("/^[a-zA-Z \s]*$/", $lastName)) {
//
//            ?><!--<span class="form-error">De voor- en/of achternaam is verkeerd ingevoerd. Gebruik a.u.b. letters.</span>--><?php
//
//            exit();
//
//        } else {
//            // Check voor valide e-mail adres
//            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//
//                ?><!--<span class="form-error">E-mail adres is verkeerd ingevoerd.</span>--><?php
//                exit();
//
//            } else {
//
//                // User in database zetten
                $sql = "INSERT INTO orders (firstName, lastName, email, zip, product, from_date, to_date) VALUES ('$firstName', '$lastName', '$email', '$zip', '$product', '$fromDate', '$toDate');";

                $result = mysqli_query($db, $sql)
                or die('Error '.mysqli_error($db).' with query '.$query);


                mysqli_close($db);
                print ("db geuploaded en connectie is gesloten");
                header('Location: ../../public/index.php');
                exit;
//            }
//
//
//
//        }
//    }
}?>

