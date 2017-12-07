<?php

// Start de sessie op.
session_start();


if (isset($_POST['submit'])) {

    include 'database.php';

    $uid = mysqli_real_escape_string($link, $_POST['uid']);
    $pwd = mysqli_real_escape_string($link, $_POST['pwd']);

    // Fout afhandeling
    // Check of input leeg is

    if (empty($uid) || empty($pwd)){

        // User heeft geen input gegeven, dus login=empty.
        header("Location: ../../public/index.php?login=empty");
        exit();

    } else {

        // Controleren of de username bestaat die de user heeft ingevoer. Alle gegevens van die matchende uid worden daarna in aan array gestopt op line 36.
        $sql = "SELECT * FROM users WHERE uid = '$uid' OR email = '$uid'";
        $result = mysqli_query($link, $sql);
        $resultCheck = mysqli_num_rows($result);

        // Als $resultCheck kleiner is dan 1, zijn er geen resultaten gevonden voor de username die de user als input heeft gegeven.
        if ($resultCheck < 1) {

            // Login=error. Ik ga de gebruiker geen kans geven om te gokken wat fout is gegaan --> veiligheid.
            header("Location: ../../public/index.php?login=error");
            exit();

        } else {

            // $row is nu een array waar de resultaten van de query in worden gestopt.
            if ($row = mysqli_fetch_assoc($result)) {

                // Controleren of de pwd echt correct.
                // De-hashing wachtwoord
                $hashedPwdCheck = password_verify($pwd, $row['pwd']);
                if ($hashedPwdCheck == false) {

                    // Zodra wachtwoord fout is, wordt de user naar de homepage gelinkt met de login=error code.
                    header("Location: ../../public/index.php?login=error");
                    exit();

                } elseif ($hashedPwdCheck == true) {

                    // Login user --> SESSION variable.
                    $_SESSION['u_id'] == $row['id'];
                    $_SESSION['u_first'] == $row['first'];
                    $_SESSION['u_last'] == $row['last'];
                    $_SESSION['u_email'] == $row['email'];
                    $_SESSION['u_uid'] == $row['uid'];
                    header("Location: ../../public/index.php?login=success");
                    exit();

                }


            }

        }

    }


} else {

    header("Location: ../public/index.php?login=error");
    exit();

}