<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-19
 * Time: 11:11 AM
 */
$a = $_POST["a"];
$b = $_POST["b"];
$c = $_POST["c"];
if ($a > $b) {
    if ($a > $c) {
        echo "a is greatest and its value is $a ";
    } else {
        echo "c is greatest and its value is $c ";
    }
} else {
    if ($b > $c) {
        echo "b is greatest and its value is $b ";
    } else {
        echo "c is greatest and its value is $c ";
    }
}
