<?php

require_once 'database.php';

if (isset($_GET['lastName'])) {

    $getEmail = $_GET['lastName'];

    $query = "SELECT * FROM `orders` WHERE `lastName`= '$getEmail'";
    $result = mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));

    if(mysqli_num_rows($result)) {
        //Zet de resultaten in een array
        $availableOrder = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $availableOrder[] = $row;

            //print_r($availableOrder);

            print_r($availableOrder[0]);
        }

    }
    else {
        // redirect when db returns no result
        header('Location: index.php');
        exit;
    }
} else {
    header('Location: index.php');
    exit;


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
    <p>Naam: <?= $availableOrder[0]['firstName']; ?> <?php echo $availableOrder[0]['lastName']; ?> </p>

    <p>Wij zullen u op <?= $availableOrder[0]['email']; ?> of <?= $availableOrder[0]['phonenumber']; ?> bereiken.</p>
    <p>Reserverings ID: <?=  $availableOrder[0]['id']; ?></p>
</div>

<?php

include_once "../views/footer.php";

?>

</body>


</html>

