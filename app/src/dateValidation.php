<?php

if (isset($_POST['submit'])) {

    // Connectie maken met database

    require_once 'database.php';

    // Submitting user input into variables.
    $fromDate = mysqli_real_escape_string($db, $_POST['fromDate']);
    $toDate = mysqli_real_escape_string($db, $_POST['toDate']);

    // Amount of days that the product will be reserved
    $sumDays = $toDate - $fromDate;

}