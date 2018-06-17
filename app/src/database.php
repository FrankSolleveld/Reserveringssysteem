<?php

session_start();
require_once 'meekrodb.2.3.class.php';
// Connectie maken met database

DB::$user       = 'root';
DB::$password   = 'root';
DB::$dbName     = 'reservesystem';
DB::$host       = 'localhost';
DB::$port       = 8889;