<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-19
 * Time: 11:38 AM
 */
$age = $_POST["age"];
if ($age < 16) {
    echo 'Kid';
} else if (($age >= 16) && ($age <= 30)) {
    echo 'Admission granted';

} else if ($age > 30) {
    echo 'age excedded';
} else echo 'Invalid age';