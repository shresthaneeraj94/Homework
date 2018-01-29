<?php
include_once 'actions/functions.php';
include_once 'includes/head.php';
if(!isset($_SESSION['id'])){
    header("location:index.php");
    exit;
}
$id = $_GET['id'];
$query = "select * from info where id=$id";
$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto form-group mb-1">
            <?php echo displayMessage(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2 mt-2">
            <form action="users.php" method="post">
                <button type="submit"><i class="fa fa-users" aria-hidden="true">Users</i></button>
            </form>
        </div>

    <div class="row">
        <div class="col-md-6 mx-auto mt-2">
            <?php $path = $row['image'];
            echo "<img src='img/$path'>";
            ?>
            Name:<?= $row['name'] ?><br>
            Email:<?= $row['email'] ?><br>
            Address:<?= $row['address'] ?><br>
            Gender:<?= $row['gender'] ?><br>
            Hobby:<?= $row['hobby'] ?><br>
        </div>
    </div>
