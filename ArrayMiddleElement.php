<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-21
 * Time: 12:29 PM
 */
$a=['Ram','Shyam','Krishna','Gopal','Hari'];
if(sizeof($a)%2==0){
    echo 'The middle element cannot be calculated';
}
else {
    $middle = (sizeof($a) - 1) / 2;
    echo"The middle element is $a[$middle]";
}