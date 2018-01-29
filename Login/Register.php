<?php


session_start();
if(isset($_SESSION['name'])|| ($_COOKIE['remember'] == 'yes')) {
    header('location: Success.php');
    die;
}
if (isset($_SESSION['errorMessage'])) {
    echo $_SESSION['errorMessage'];
    unset($_SESSION['errorMessage']);
}
?>
<form action="RegisterAction.php" method="POST">
    <h2>Username</h2>
    <input type="text" name="name"><br>
    <h2>Password</h2>
    <input type="password" name="password"><br><br>
    <h2>Confirm Password</h2>
    <input type="password" name="confirmPassword"><br><br>
    <button type="submit">Register</button>
</form>

