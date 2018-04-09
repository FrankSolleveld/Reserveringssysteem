<?php

if (isset($_POST['submit'])) {

    // Connectie maken met database

    require_once 'database.php';

    // Submitting user input into variables.
    $product = mysqli_real_escape_string($db, $_POST['selected-product']);
    $fromDate = mysqli_real_escape_string($db, $_POST['fromDate']);
    $toDate = mysqli_real_escape_string($db, $_POST['toDate']);
    $firstName = mysqli_real_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_real_escape_string($db, $_POST['lastName']);
    $zip = mysqli_real_escape_string($db, $_POST['zip']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phonenumber = mysqli_real_escape_string($db, $_POST['phonenumber']);


    $_SESSION['firstName'] = $firstName;
    print_r($product);

// We geven een bericht af aan de pagina zodra er iets onjist wordt ingevoerd.
    if (empty($firstName)|| empty($lastName) || empty($email) || empty($fromDate) || empty($toDate) || empty($zip) || empty($product))  {

        if (empty($firstName)){ $_SESSION['error-firstName'] = 1;  }else{ $_SESSION['error-firstName'] = 0; }

        header("Location: ../../public/index.php");
        ?><span class="form-error">Vul a.u.b. alle velden in!</span><?php

//        print_r($firstName);
//        print_r($_POST);

        exit();
    } else {
        // Check voor gebruik van juiste karakters
        if (!preg_match("/^[a-zA-Z- \s]*$/", $firstName) || !preg_match("/^[a-zA-Z \s]*$/", $lastName)) {

            header("Location: ../../public/index.php");
            ?><span class="form-error">De voor- en/of achternaam is verkeerd ingevoerd. Gebruik a.u.b. letters.</span><?php
//            print_r($_POST);
            exit();

        } else {
            // Check voor valide e-mail adres
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

                header("Location: ../../public/index.php");
                ?><span class="form-error">E-mail adres is verkeerd ingevoerd.</span><?php
//                print_r($_POST);
                exit();

            } else {

                // User in database zetten
                $sql = "INSERT INTO reservations (firstName, lastName, email, phonenumber, zip, product, fromDate, toDate) VALUES ('$firstName', '$lastName', '$email','$phonenumber', '$zip', '$product', '$fromDate', '$toDate')";

                $result = mysqli_query($db, $sql)
                or die('Error '.mysqli_error($db).' with query '.$query);

                // Met GET wordt het ID meegegeven en daarmee kan de landing page alle belangrijke informatie van de klant bevatten.

                unset($_SESSION['firstName']);
                unset($_SESSION['error-firstName']);

                header("Location: ../../public/index.php");

            }
        }
    }
}?>



