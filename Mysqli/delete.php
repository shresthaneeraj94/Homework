<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2018-01-15
 * Time: 9:11 AM
 */
$id=$_GET['del_id'];
$connection = mysqli_connect('127.0.0.1', 'root', '', 'info');
$query = "delete from person where id=$id";
$result = mysqli_query($connection, $query);
if ($result) {
    echo "Data successfully deleted";
} else {
    echo mysqli_error($connection);
}
mysqli_close($connection);
header("refresh:2;url=MysqliTest.php");