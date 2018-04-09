<?php

require_once 'database.php';

if (isset($_POST['submit'])) {

// Functies maken

        // Submitting user input into variables.
        $fromDate = mysqli_real_escape_string($db, $_POST['fromDate']);
        $toDate = mysqli_real_escape_string($db, $_POST['toDate']);

        if ($fromDate = "" || $toDate = "") {

            echo "Geen datum geselecteerd";
            exit();

        } else {

            // Amount of days that the product will be reserved
            $fromTimeStamp = strtotime($fromDate);
            $toTimeStamp = strtotime($toDate);

            $finalStamp = $toTimeStamp - $fromTimeStamp;

        }


}