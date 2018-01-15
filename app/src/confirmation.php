<?php

require_once 'database.php';


    $query = "SELECT * FROM orders";
    $result = mysqli_query($db, $query);

//Zet de resultaten in een array
    $orderNumbers = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $orderNumbers[] = $row;
    }

?>

<html>
<head>

    <title>Reservering ontvangen</title>

    <link rel="stylesheet" href="../normalize.css">
    <link rel="stylesheet" href="../main.css">
    <link rel="stylesheet" href="reservations.css">
    <link rel="stylesheet" href="../content-styles.css">

</head>

<body>
<?php
include_once "../views/header.php"; ?>

<div id="order-confirmation">

    <h1>Reservering ontvangen</h1>
    <p>Bedankt. We hebben uw reservering ontvangen en zullen zo spoedig mogelijk contact met u opnemen.</p>
    <p>Hieronder een overzicht van uw reservering:</p>
    <br>
    <p>Naam: <?php print_r($firstName) ?> <?php print_r($lastName) ?> </p>

    <p>Reserverings ID: <?php print_r($orderNumbers['order-id']) ?></p>
</div>

<?php

include_once "../views/footer.php";

?>

</body>


</html>