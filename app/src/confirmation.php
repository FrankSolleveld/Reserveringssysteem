<?php

require_once 'database.php';


$email = $_GET['email'];

$query = "SELECT FROM orders WHERE email = " . mysqli_escape_string($db, $email);
$result = mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));

//Zet de resultaten in een array
$availableOrder = [];
while ($row = mysqli_fetch_assoc($result)) {
    $availableOrder[] = $row;
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
    <p>Naam: <?php $availableOrder['firstName']; ?> <?php $availableOrder['lastName']; ?> </p>

    <p>Reserverings ID: <?php $availableOrder['id'] ?></p>
</div>

<?php

include_once "../views/footer.php";

?>

</body>


</html>