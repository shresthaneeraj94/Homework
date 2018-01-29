<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2018-01-22
 * Time: 9:27 AM
 */
include_once 'functions.php';
session_destroy();
header("location:../index.php");