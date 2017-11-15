<?php
/**
 * Created by PhpStorm.
 * User: franksolleveld
 * Date: 15-11-17
 * Time: 16:26
 */
$myDatabase = new mysqli('sql.hosted.hr.nl', '0940599', 'eopubuac', '0940599');

if($myDatabase->connect_errno > 0){
    die('Unable to connect to database [' . $myDatabase->connect_error . ']');
} else {
    echo("Connectie gelukt");
}