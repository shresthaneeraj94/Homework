<?php
include_once 'actions/functions.php';
include_once 'includes/head.php';
if(!isset($_SESSION['id'])){
    header("location:index.php");
    exit;
}
$id = $_SESSION['id'];
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
        <div class="col-md-6 mx-auto mt-2">
            <h1 class="btn btn-dark btn-block">WELCOME <?php echo strtoupper($_SESSION['user']) ?></h1>
        </div>


    </div>
    <div class="row">
        <div class="col-md-3 mt-2"></div>
        <div class="col-md-2 mt-2">
            <form action="signup.php" method="post">
                <button type="submit"><i class="fa fa-user-plus" aria-hidden="true">Add new User</i></button>
            </form>
        </div>
        <div class="col-md-2 mt-2">
            <form action="users.php" method="post">
                <button type="submit"><i class="fa fa-users" aria-hidden="true">Users</i></button>
            </form>
        </div>
        <div class="col-md- mt-2">
            <form action="actions/logout.php" method="post">
                <button type="submit"><i class="fa fa-sign-out" aria-hidden="true"> Signout</i></button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mx-auto mt-2">
            <?php $path = $row['image'];
            echo "<img src='img/$path'>";
            ?>
            <form method="post" enctype="multipart/form-data">
                <input type="file" name="myFile">
                <button type="submit">Change profile pic</button>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $fileName = $_FILES['myFile']['name'];
                $fileLoc = $_FILES['myFile']['tmp_name'];

                if ($fileError === 0) {
                    if (move_uploaded_file($fileLoc, 'img/' . $fileName)) {
                        echo "Profile picture uploaded";

                    }
                } else {
                    echo 'Error encountered';
                }
                $query = "update info set image='$fileName' where id=$id";
                $result = mysqli_query($connect, $query);
                if ($result) {
                    $_SESSION['success'] = 'Profile picture changed successfully';
                } else {
                    $_SESSION['fail'] = mysqli_error($connect);

                }
                header('Location: profile.php');
                exit;
            }
            ?>

            Name:<?= $row['name'] ?><br>
            Email:<?= $row['email'] ?><br>
            Address:<?= $row['address'] ?><br>
            Gender:<?= $row['gender'] ?><br>
            Hobby:<?= $row['hobby'] ?><br>
        </div>
    </div>
