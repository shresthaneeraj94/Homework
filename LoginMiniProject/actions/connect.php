<?php
session_start();
define('HOST','127.0.0.1');
define('USER','root');
define('PASSWORD','');
define('DB','login');

$connect = mysqli_connect(HOST, USER, PASSWORD, DB);

if (!$connect) {
    die(mysqli_connect_error());
}