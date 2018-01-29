<?php
include_once 'functions.php';
include_once '../includes/head.php';
if(!isset($_SESSION['id'])){
    header("location:../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    if($_POST['password']!=$_POST['cpassword']){
        $_SESSION['fail'] = "Password and confirm password don't match";
        header('Location: ../signup.php');
        exit;
    }

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $address = $_POST['address'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $hobby = isset($_POST['hobby']) ? implode(',', $_POST['hobby']) : '';
    $query = "INSERT INTO info(name,email,address,gender,hobby,password) VALUES 
                      ('{$name}','{$email}','{$address}','{$gender}','{$hobby}','{$password}')";

    $result = mysqli_query($connect, $query);
    if ($result) {
        $_SESSION['success'] = 'INSERTED SUCCESSFULLY';
        header('Location: ../users.php');
        exit;
    } else {
        $_SESSION['fail'] = mysqli_error($connect);
       header('Location: ../signup.php');
        exit;
    }
}
 else {
    header('Location: ../signup.php');
}

 include_once 'includes/foot.php';
