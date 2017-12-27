<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-25
 * Time: 2:39 PM
 */
function myMin(...$x)
{

    $min = $x[0];
    for($i=1;$i<count($x);$i++){
        if($x[$i]<$min){
            $min=$x[$i];
        }
    }
    return $min;

}

echo myMin(10,15,18,-100,9,18);