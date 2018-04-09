<?php
//Require database in this file & image helpers
require_once "../src/database.php";
session_start();
//Check if Post isset, else do nothing
if (isset($_POST['submit'])) {
    //Postback with the data showed to the user, first retrieve data from 'Super global'
    $productId        = mysqli_escape_string($db, $_POST['productID']);
    $productName       = mysqli_escape_string($db, $_POST['productName']);
    $category          = mysqli_escape_string($db, $_POST['category']);
    $quantity    = mysqli_escape_string($db, $_POST['quantity']);
    $price       = mysqli_escape_string($db, $_POST['price']);
    //Save variables to array so the form won't break
    //This array is build the same way as the db result
    $products = [
        'productID'         => $productId,
        'productName'       => $productName,
        'category'   => $category,
        'quantity'   => $quantity,
        'price'      => $price,
    ];
    if (empty($errors)) {
        //Update the record in the database
        $query = "UPDATE products
                  SET productID = '$productId', productName = '$productName', category = '$category', quantity = '$quantity', price = '$price'
                  WHERE productID = '$productId'";
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
    $query = "SELECT * FROM products WHERE productID = " . mysqli_escape_string($db, $productId);
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
    <title>Compleet IT - Admin Edit</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="../main-layout.css"/>
    <link rel="stylesheet" type="text/css" href="../content.css"/>
    <link rel="stylesheet" type="text/css" href="../edit-page.css"/>
</head>
<body>
<header>
    <nav>
        <div class="main-wrapper">

            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>

            <div class="nav-login">

                <?php if (isset($_SESSION['u_uid'])) { ?>
                    <!--   Zodra user is ingelogd, krijgt hij/zij de optie om uit te loggen.-->
                    <form action="../src/logout.php" method="post">
                        <button id="signOut" type="submit" name="submit">Log uit</button>
                    </form>
                <?php } else { ?>

                    <!-- Zodra er geen user is ingelogd, krijg je het inlogvenster te zien.-->
                    <form action="../src/login.php" method="post">
                        <input type="text" name="uid" placeholder="Gebruikersnaam / E-mail">
                        <input type="password" name="pwd" placeholder="Wachtwoord">

                        <button type="submit" name="submit">Log in</button>
                    </form>

                <?php } ?>


            </div>

        </div>
    </nav>
</header>

<section>
    <h1>Edit <br>"<?= 'Product ID: ' . $product['productID'] . ' - ' . $product['productName']; ?>"</h1>

    <div id="form">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="data-field">
                <label for="id">Product ID</label>
                <input id="productName" type="text" name="productID" value="<?= $product['productID'] ?>"/>
                <span class="errors"><?= isset($errors['productID']) ? $errors['productID'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="product-name">Productnaam</label>
                <input id="productName" type="text" name="productName" value="<?= $product['productName'] ?>"/>
                <span class="errors"><?= isset($errors['productName']) ? $errors['productName'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="category">Categorie</label>
                <input id="category" type="text" name="category" value="<?= $product['category'] ?>"/>
                <span class="errors"><?= isset($errors['category']) ? $errors['category'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="price">Prijs per dag in €</label>
                <input id="price" type="number" name="price" value="<?= $product['price'] ?>"/>
                <span class="errors"><?= isset($errors['price']) ? $errors['price'] : '' ?></span>
            </div>
            <div class="data-field">
                <label for="quantity">Voorraad</label>
                <input id="quantity" type="number" name="quantity" value="<?= $product['quantity'] ?>"/>
                <span class="errors"><?= isset($errors['quantity']) ? $errors['quantity'] : '' ?></span>
            </div>

            <div class="data-submit">
                <!--        <input type="hidden" name="id" value="--><?//= $productId; ?><!--"/>-->
                <!--        <input type="hidden" name="current-image" value="--><?//= $product['image']; ?><!--"/>-->
                <input type="submit" name="submit" value="Save"/>
            </div>
        </form>
        <div>
            <a href="../../public/index.php">Terug naar Admin Panel</a>
        </div>
    </div>
</section>
<?php
include_once "footer.php";
?>
?>
</body>
</html>