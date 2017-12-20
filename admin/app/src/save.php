<?php

require_once "database.php";
// data uit form ophalen
if(isset($_POST['submit'])) {

    // mysqli_real_escape_string --> zodat users geen code erin kunnen stoppen
    $first = mysqli_real_escape_string($db, $_POST['first']);
    $last = mysqli_real_escape_string($db, $_POST['last']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $uid = mysqli_real_escape_string($db, $_POST['uid']);
    $pwd = mysqli_real_escape_string($db  , $_POST['pwd']);


    // Validatie

    // Check voor lege velden
    if (empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)) {
        // Pagina wordt opnieuw geladen zodra 1 van bovenstaande velden leeg is.
        header('Location: ../../public/index.php?signup=empty');
        exit();

    } else {

        // Check voor gebruik van juiste karakters
        if(!preg_match("/^[a-zA-Z- \s]*$/", $first)|| !preg_match("/^[a-zA-Z \s]*$/", $last)){

            header('Location: ../../public/index.php?signup=invalid');
            exit();

        } else {
            // Check voor valide e-mail adres
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

                header('Location: ../../public/index.php?signup=invalidemail');
                exit();

            } else {

                $sql = "SELECT * FROM users WHERE uid = '$uid'";
                $result = mysqli_query($db, $sql);
                $resultCheck = mysqli_num_rows($result);

                // Als username == admin --> user taken. Men mag geen admin heten in mijn optiek.
                if($resultCheck > 0 || $uid == "admin") {
                    header('Location: ../../public/index.php?signup=usertaken');
                    exit();
                } else {
                    // Hashing password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    // User in database zetten
                    $sql = "INSERT INTO users (first, last, email, uid, pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";

                    $result = mysqli_query($db, $sql)
                    or die('Error '.mysqli_error($db).' with query '.$query);


                    mysqli_close($db);

                    header('Location: ../../public/index.php?signup=success');
                    exit;
                }
            }
        }

    }
}