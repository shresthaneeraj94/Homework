<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-26
 * Time: 12:43 PM
 */

function myStrRepeat(string $a,int $n){
    $b="";
    for($i=0;$i<$n    ;$i++){
        $b=$b.$a;
    }
    return $b;
}
echo myStrRepeat('apple',5);
