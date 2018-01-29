<?php
session_start();
session_destroy();
setcookie('remember','',1);
setcookie('username','',1);
header('location:index.php');