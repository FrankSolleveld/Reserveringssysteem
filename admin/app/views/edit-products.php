<?php
//Require database in this file & image helpers
require_once "../src/database.php";

//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $productId        = mysqli_escape_string($db, $_POST['id']);
    $productName       = mysqli_escape_string($db, $_POST['productname']);
    $category          = mysqli_escape_string($db, $_POST['category']);
    $quantity    = mysqli_escape_string($db, $_POST['quantity']);
    $price       = mysqli_escape_string($db, $_POST['price']);


    //Save variables to array so the form won't break
    //This array is build the same way as the db result
    $products = [
        'id'         => $productId,
        'productname'       => $productName,
        'category'   => $category,
        'quantity'   => $quantity,
        'price'      => $price,
    ];

    if (empty($errors)) {
        //Update the record in the database
        $query = "UPDATE products
                  SET id = '$productId', productname = '$productName', category = '$category', quantity = '$quantity', price = '$price'
                  WHERE id = '$productId'";
        $result = mysqli_query($db, $query);

        if ($result) {
            header('Location: ../../public/index.php');
            exit;
        } else {
            $errors[] = 'Something went wrong in your database query: ' . mysqli_error($db);
        }

    }
} else if(isset($_GET['id'])) {
    //Retrieve the GET parameter from the 'Super global'
    $productId  = $_GET['id'];

    //Get the record from the database result
    $query = "SELECT * FROM products WHERE id = " . mysqli_escape_string($db, $productId);
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1)
    {
        $product = mysqli_fetch_assoc($result);
    }
    else {
        // redirect when db returns no result
        header('Location: ../../public/index.php');
        exit;
    }
} else {
    header('Location: ../../public/index.php');
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
<h1>Edit "<?= $product['id'] . ' - ' . $product['name']; ?>"</h1>

<form action="" method="post" enctype="multipart/form-data">
    <div class="data-field">
        <label for="id">Product ID</label>
        <input id="productname" type="text" name="id" value="<?= $product['id'] ?>"/>
        <span class="errors"><?= isset($errors['id']) ? $errors['id'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="product-name">Productnaam</label>
        <input id="productname" type="text" name="productname" value="<?= $product['productname'] ?>"/>
        <span class="errors"><?= isset($errors['productname']) ? $errors['productname'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="category">Categorie</label>
        <input id="category" type="text" name="category" value="<?= $product['category'] ?>"/>
        <span class="errors"><?= isset($errors['category']) ? $errors['category'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="quantity">Voorraad</label>
        <input id="quantity" type="number" name="quantity" value="<?= $product['quantity'] ?>"/>
        <span class="errors"><?= isset($errors['quantity']) ? $errors['quantity'] : '' ?></span>
    </div>
    <div class="data-field">
        <label for="price">Prijs per dag in €</label>
        <input id="price" type="number" name="price" value="<?= $product['price'] ?>"/>
        <span class="errors"><?= isset($errors['price']) ? $errors['price'] : '' ?></span>
    </div>
    <div class="data-submit">
<!--        <input type="hidden" name="id" value="--><?//= $productId; ?><!--"/>-->
<!--        <input type="hidden" name="current-image" value="--><?//= $product['image']; ?><!--"/>-->
        <input type="submit" name="submit" value="Save"/>
    </div>
</form>
<div>
    <a href="index.php">Go back to the list</a>
</div>
</body>
</html>
