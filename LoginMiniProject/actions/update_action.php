<?php
require_once 'functions.php';
if(!isset($_SESSION['id'])){
    header("location:../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $hobby = isset($_POST['hobby']) ? implode(',', $_POST['hobby']) : '';

    $id = (int)$_POST['user_id'];

    $query = "UPDATE info SET 
                    name='{$name}',
                    email='{$email}',
                    address='{$address}',
                    gender='{$gender}',
                    hobby='{$hobby}' WHERE id=" . $id;

    $result = mysqli_query($connect, $query);

    if ($result) {
        $_SESSION['success'] = 'Updated Successfully';
        header('Location: ../users.php');
        exit;
    } else {
        $_SESSION['fail'] = mysqli_error($connect);
        header('Location: ../update.php?id=' . $id);
        exit;
    }
} else {
    header('Location: ../users.php');
}
