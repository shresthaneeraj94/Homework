<?php $id=$_GET['del_id']; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>update</title>
</head>
<body>
<form method="POST">
    <p> Name: <input type="text" name="name"></p>
    <p> Age: <input type="number" name="age"></p>
    <p> Email: <input type="text" name="email"></p>
    <p> Address: <input type="text" name="address"></p>
    <input type="submit" value="update">
</form>
<hr>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST)) {
$name = $_POST['name'];
$age = $_POST['age'];
$email = $_POST['email'];
$address = $_POST['address'];
$connection = mysqli_connect('127.0.0.1', 'root', '', 'info');
$query = "update person set name='$name', age=$age, email='$email', address='$address' where id=$id";
$result = mysqli_query($connection, $query);
if ($result) {
echo "Information successfully updated";
} else {
echo mysqli_error($connection);
}
mysqli_close($connection);
    header("refresh:2;url=MysqliTest.php");
}

?>
