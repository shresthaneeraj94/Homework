<?php
include_once 'functions.php';
include_once '../includes/head.php';
if(!$_SERVER['REQUEST_METHOD']=='post'){
    header("location:../index.php");
    end;
}
$email=$_POST['email'];
$password=$_POST['password'];
$query = "select * from info";
$result = mysqli_query($connect, $query);
while ($row = mysqli_fetch_assoc($result)){
    if(($email==$row['email'])&& password_verify($password,$row['password'])){
        $_SESSION['success']="Successfull Login";
        $_SESSION['user']=$row['name'];
        $_SESSION['id']=$row['id'];
        header('location:../profile.php');
        exit;
    }
    else{
        $_SESSION['fail']="Invalid login";
        header('location: ../index.php');
    }
}
include_once 'includes/foot.php';
?>