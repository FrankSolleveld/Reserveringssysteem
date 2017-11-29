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

	<!-- Javascripts -->
    <!-- Javascripts -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

</head>

<body>
<?php
include '../app/views/header.php';
include '../app/views/content.php';
include '../app/views/footer.php';
?>
</body>

</html>