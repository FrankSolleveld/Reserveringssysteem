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

    <h3>Wat wilt u reserveren?</h3><br>

    <div class="leftPanel ">
        <p>lorem ipsum dolor sit amet</p>
        <form method="post" >
            <input type="text" name="username">
            <input type="password" name="password">
            <button type="submit">Verzenden</button>
        </form>
    </div>
    </div>
</div>
</div>

