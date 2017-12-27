<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-26
 * Time: 1:13 PM
 */
function removeRepition(array $a)
{   $j=1;
    $result[] = $a[0];
    for ($i = 1; $i < count($a); $i++) {
        if (in_array($a[$i], $result)) {
            continue;

        } else {
            $result[$j] =  $a[$i];
            $j++;
        }

    }
    sort($result);
    return ($result);
}
print_r(removeRepition([1,2,3,4,5,6,7,7,7,15,15,10,10,9])) ;