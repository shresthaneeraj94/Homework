<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-22
 * Time: 2:59 PM
 */
$info=[
    'p1'=>['name'=>'James','age'=>20],
    'p2'=>['name'=>'John','age'=>21],
    'p3'=>['name'=>'Sam','age'=>23],
];

foreach($info as $value){
    foreach($value as $item){
       echo $item.'<br>';
    }

}
