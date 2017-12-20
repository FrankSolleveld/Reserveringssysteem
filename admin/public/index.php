<?php
require_once '../app/src/database.php';
?>

<head>

    <meta charset="utf-8">
    <title>Compleet IT - Admin Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- Favicon -->
    <link href="../app/media/favicon.ico" rel="icon" type="image/x-icon" />

    <!-- CSS files -->
    <link rel="stylesheet" href="../app/normalize.css">
    <link rel="stylesheet" href="../app/main.css">
    <link rel="stylesheet" href="../app/content-styles.css">
    <link rel=stylesheet href="../app/admin.css" type="text/css"/>

    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

</head>

<body>
<?php

include_once '../app/views/header.php';
include_once '../app/views/content.php';
if ($_SESSION['u_uid'] == 'frank') {

    include '../app/views/signup.php';

} elseif (($_SESSION['u_uid'] == 'dick') ||($_SESSION['u_uid'] == 'sander')) {

    include '../app/views/admin-panel.php';

} elseif (($_SESSION['u_uid'] == 'sunnie')) {

    ?> <p> Hoi, <?php print ($_SESSION['u_uid']);?>.</p> <?php
}
include_once '../app/views/footer.php';

?>

</body>

</html>