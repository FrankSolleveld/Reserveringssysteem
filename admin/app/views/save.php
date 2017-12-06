<?php

require_once "../src/database.php";
// data uit form ophalen
if(isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'];
}


// data checken



// data naar db


$query  = "INSERT INTO users (first, last, email, uid, pwd) VALUES ('$first', '$last', '$email', '$uid', '$pwd')";

$result = mysqli_query($link, $query)
or die('Error '.mysqli_error($link).' with query '.$query);


mysqli_close($db);

//redirect php

header('Location: http://ikbenfrank.ml/reservering/public');
exit;