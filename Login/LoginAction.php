<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2018-01-01
 * Time: 9:58 AM
 */
session_start();
if(isset($_SESSION['name'])) {
    header('location: Success.php');
    die;
}

if($_SERVER['REQUEST_METHOD']==='POST' && !empty($_POST)) {
    $username = $_POST["name"];
    $password = $_POST["password"];
    $parse = "Username=$username & Password=$password\n";
    echo "Username:$username <br>";
    echo "Password:$password";
    $handle = fopen("users.txt", "r");
    $data = "";
    while (!feof($handle)) {
        $data = fgets($handle);
        if ($data == $parse) {
            if($_POST['remember']=='yes'){
                setcookie('remember','yes',time()+(24*60*60));
                setcookie('username',$username,time()+(24*60*60));
            }
            $_SESSION['name']=$username;
            header("refresh:3;url=Success.php");
            die;
        } else {
            $_SESSION['login'] = "Invalid login !!!";
            header("refresh:3;url=Login.php");
        }
    }
}
else {
    echo 'Login first';
}