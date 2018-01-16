<?php
//Require database in this file & image helpers
require_once "../src/database.php";

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $product        = mysqli_escape_string($db, $_POST['product']);
    $lastName       = mysqli_escape_string($db, $_POST['lastName']);
    $email          = mysqli_escape_string($db, $_POST['email']);
    $phonenumber    = mysqli_escape_string($db, $_POST['phonenumber']);
    $fromDate       = mysqli_escape_string($db, $_POST['fromDate']);
    $toDate         = mysqli_escape_string($db, $_POST['toDate']);

    //Save variables to array so the form won't break
    //This array is build the same way as the db result
    $order = [
        'product'       => $artist,
        'lastName'      => $lastName,
        'email'         => $email,
        'phonenumber'   => $phonenumber,
        'fromDate'      => $fromDate,
        'toDate'        => $toDate,
    ];

    if (empty($errors)) {
        //Update the record in the database
        $query = "UPDATE albums
                  SET product = '$product', lastName = '$lastName', email = '$email', phonenumber = '$phonenumber', fromDate = '$fromDate', toDate = '$toDate'
                  WHERE order-id = '$albumId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

    }
} else if(isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $albumId = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM albums WHERE id = " . mysqli_escape_string($db, $albumId);
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1)
    {
        $album = mysqli_fetch_assoc($result);
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

//Close connection
mysqli_close($db);
?>
<!doctype html>
<html>
<head>
    <title>Music Collection Edit</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<h1>Edit "<?= $album['artist'] . ' - ' . $album['name']; ?>"</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="artist">Artist</label>
        <input id="artist" type="text" name="artist" value="<?= $album['artist'] ?>"/>
        <span class="errors"><?= isset($errors['artist']) ? $errors['artist'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="name">Album</label>
        <input id="name" type="text" name="name" value="<?= $album['name'] ?>"/>
        <span class="errors"><?= isset($errors['name']) ? $errors['name'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="genre">Genre</label>
        <input id="genre" type="text" name="genre" value="<?= $album['genre'] ?>"/>
        <span class="errors"><?= isset($errors['genre']) ? $errors['genre'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="year">Year</label>
        <input id="year" type="text" name="year" value="<?= $album['year'] ?>"/>
        <span class="errors"><?= isset($errors['year']) ? $errors['year'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="tracks">Tracks</label>
        <input id="tracks" type="number" name="tracks" value="<?= $album['tracks'] ?>"/>
        <span class="errors"><?= isset($errors['tracks']) ? $errors['tracks'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="image">Image</label>
        <input type="file" name="image" id="image"/>
    </div>
    <div class="data-submit">
        <input type="hidden" name="id" value="<?= $albumId; ?>"/>
        <input type="hidden" name="current-image" value="<?= $album['image']; ?>"/>
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
