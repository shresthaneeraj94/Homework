<?php
require_once 'functions.php';
if(!isset($_SESSION['id'])){
    header("location:../index.php");
    exit;
}

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = (int)$_GET['id'];
    if ($id != $_SESSION['id']) {
        $_SESSION['fail'] = "You have no right to delete the user";
        header("location:../users.php");
        exit;
    }

    $query = "DELETE FROM info WHERE id = {$id}";
    $result = mysqli_query($connect, $query);


    if ($result) {
        $_SESSION['success'] = 'Deleted Successfully';
        header('Location: logout.php');
        exit;
    } else {
        $_SESSION['fail'] = mysqli_error($connect);
        header('Location: ../users.php');
        exit;
    }

}



