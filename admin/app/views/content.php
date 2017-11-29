<?php
/**
 * Created by PhpStorm.
 * User: franksolleveld
 * Date: 15-11-17
 * Time: 15:23
 */

$values = $_POST;

/**if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')" ;
    $db->query($sql);
}*/

?>
<div id="viewport">
    <div class="mainframe">

        <img src="../../app/media/user-icon.png"/><br>

    <form>
        <input type="text" name="username" placeholder="Gebruikernaam"><br>
        <input type="password" name="password" placeholder="Wachtwoord">
    </form>
    </div>

</div>

