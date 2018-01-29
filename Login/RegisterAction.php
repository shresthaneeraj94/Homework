<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2018-01-01
 * Time: 9:17 AM
 */
session_start();
if (isset($_SESSION['name'])|| ($_COOKIE['remember'] == 'yes')) {
    header('location: Success.php');
    die;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    $username = $_POST["name"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    if (empty($username) || empty($password) || empty($confirmPassword)) {
        $_SESSION['errorMessage'] = "Unsuccessful Registration. Some fields are empty";
        header('Location: Register.php');
        die;
    }


    if ($password === $confirmPassword) {
        echo "Login successful with: <br>";
        echo "Name : $username <br>";
        echo "Password : $password <br>";
        echo "Confirm Password: $confirmPassword <br>";
        $handle = fopen("users.txt", "a");
        fwrite($handle, "Username=$username & Password=$password");
        fwrite($handle, "\n");
        fclose($handle);
        header('Refresh: 3; URL=Login.php');
    } else {

        $_SESSION['errorMessage'] = "Password doesn't match";

        header('Location: Register.php');
    }
} else {
    echo 'Login first';
}