<?php
session_start();

require_once '../app/src/database.php';

?>
<!doctype html>
<html lang="en">
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
    <link rel="stylesheet" href="../app/main-layout.css">
    <link rel="stylesheet" href="../app/content.css">
    <link rel=stylesheet href="../app/adminpage.css" type="text/css"/>

    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

</head>
<body>
<?php

include '../app/views/header.php';

if ($_SESSION['u_uid'] == 'frank') {

    include '../app/views/signup.php';

} elseif ($_SESSION['u_uid'] == 'dick' || ($_SESSION['u_uid'] == 'sander')) {
    require '../app/views/admin-panel.php';

} else { ?>

    <p>Je moet ingelogd zijn om dingen te bereiken op deze pagina.</p>

<?php

}

include '../app/views/content.php';
include '../app/views/footer.php';

?>

</body>
</html>




</html>