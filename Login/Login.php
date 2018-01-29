<?php
session_start();
if (isset($_SESSION['name'])||isset($_COOKIE['remember'])) {
    header('location: Success.php');
    die;
}

?>
<link rel="stylesheet" href="CSS/style.css">
<div class="container">
    <div class="header"><h1>LOGIN</h1></div>
    <div class="login">
        <form action="LoginAction.php" method="POST">

            <p><b>Name</b><br>
                <input type="text" placeholder="Enter Username" name="name"></p>
            <p><b> Password</b><br>
                <input type="password" placeholder="Enter Password" name="password"></p>
            <input type="checkbox" name="remember" value="yes">Remember me
            <button type="submit">Login</button>
            <a href="Register.php">Register New User</a><br><br>
        </form>
        <?php if (isset($_SESSION['login'])) {

            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
    </div>
</div>

