<?php
require_once '../app/src/database.php';
?>

<head>

	<meta charset="utf-8">
	<title>Compleet IT Reserveringen</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>

<body>
<?php
include '../app/views/header.php';
include '../app/views/content.php';
include '../app/views/footer.php';

?>
<script>
var settings = {
"async": true,
"crossDomain": true,
"url": "https://api.postcodeapi.nu/v2/addresses/?postcode=5038EA&number=19",
"method": "GET",
"headers": {
"x-api-key": "wAmF6CUMWn4P1ksMkHI68asLLP4Mtv90atbAuKKx",
"accept": "application/hal+json"
}
}

$.ajax(settings).done(function (response) {
console.log(response);
});
</script>
<!--<script>-->
<!--    window.postcodeapi = {-->
<!--        token: '<<PLAK HIER DE WIDGET TOKEN>>',-->
<!--        fields: {-->
<!--            postcode: 'form-zip',-->
<!--            number: 'form-housenumber',-->
<!--            street: 'form-streetaddress',-->
<!--            city: 'form-city"',-->
<!--        },-->
<!--    };-->
<!--</script>-->
<!--<script src="https://cdn.postcodeapi.nu/widget-v1.1.js" async defer></script>-->
</body>

</html>