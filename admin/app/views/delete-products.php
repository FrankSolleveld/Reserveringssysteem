<?php

require_once "../src/database.php";

$productId = $_GET['id'];

//Remove from the database
$query = "DELETE FROM products WHERE id = " . mysqli_escape_string($db, $productId);
mysqli_query($db, $query) or die ('Error: '.mysqli_error($db));
//Close connection
mysqli_close($db);
//Redirect to homepage after deletion & exit script
header("Location: ../../public/index.php");
exit;