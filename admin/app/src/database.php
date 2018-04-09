<?php

// Connectie maken met database

$user       = 'root';
$password   = 'root';
$database   = 'reservesystem';
$host       = 'localhost';
$port       = 8889;


$db = mysqli_connect($host, $user, $password, $database)
    or die ('Error: '.mysqli_connect_error());

