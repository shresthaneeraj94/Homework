<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-22
 * Time: 2:51 PM
 */
$info=[
        ['Ram','ram@gmail.com','Kalanki'],
        ['Shyam','shyam@gmail.com','Putalisadak'],
        ['Hari','hari@gmail.com','Thapathali']
];
for($i=0;$i<3;$i++){
    for($j=0;$j<3;$j++){
        echo $info[$i][$j].'  ';
    }
    echo'<br>';
}