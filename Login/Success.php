<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2018-01-01
 * Time: 2:37 PM
 */

session_start();
if (isset($_SESSION['name']) || ($_COOKIE['remember'] == 'yes')) {
    if ($_COOKIE['remember'] == 'yes') {
        echo "Welcome ";
        echo $_COOKIE['username'];
    } else {
        echo "Welcome ";
        echo $_SESSION['name'];

        echo '<br>';
    }
} else {
    echo 'login first';
    die;
}
?>
<form action="Logout.php" method="post">
    <button type="submit">Logout</button>
</form>
