<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'info');
    $query = "insert into person(name,age,email,address) values('$name',$age,'$email','$address')";
    $result = mysqli_query($connection, $query);
    if ($result) {
        echo "Information of $name having age $age, email $email and address $address successfully inserted";
    } else {
        echo mysqli_error($connection);
    }
    mysqli_close($connection);
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Personal information</title>
    <link rel="stylesheet" href="CSS/bootstrap.css">
</head>
<body>
<div class="container">
    <form method="POST">
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Name: <input type="text" name="name" class="form-control" placeholder="Input your name"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Age: <input type="number" name="age" class="form-control" placeholder="Input your age"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Email: <input type="text" name="email" class="form-control" placeholder="Input your email"></p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <p> Address: <input type="text" name="address" class="form-control" placeholder="Input your address">
                </p></div>
        </div>
        <div class="row">
            <div class="col-md-6 mx-auto form-group mb-3">
                <input type="submit" class="btn btn-success btn-block" value="insert">
            </div>
        </div>
    </form>

    <hr>
    <?php
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'info');
    $query = "select * from person";
    $result = mysqli_query($connection, $query);
    ?>
    <div class="row">
        <div class="col-md-6 mx-auto ">
            <table border="1" width="550">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Action</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <?php $del_id = $row['id']; ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['age'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['address'] ?></td>
                        <td><a href="delete.php? del_id=<?= $del_id ?> ">Delete</a> <a
                                    href="update.php? del_id=<?= $del_id ?> ">Update</a></td>
                    </tr>
                <?php endwhile;
                mysqli_free_result($result);
                ?>
            </table>
        </div>
    </div>
    <script type="text/javascript" src="public_html/js/jquery-slim.min.js"></script>
    <script type="text/javascript" src="public_html/js/popper.min.js"></script>
    <script type="text/javascript" src="public_html/js/bootstrap.js"></script>
</div>
</body>
</html>


