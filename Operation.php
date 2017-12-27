<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-19
 * Time: 11:56 AM
 */
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$operation=$_POST["operation"];
switch($operation){
    case '+':
        $ans=$num1+$num2;
        echo"The sum of $num1 and $num2 is $ans";
        break;
    case '-':
        $ans=$num1-$num2;
        echo"The difference of $num1 and $num2 is $ans";
        break;
    case '*':
        $ans=$num1*$num2;
        echo"The product of $num1 and $num2 is $ans";
        break;
    case '/':
        $ans=$num1/$num2;
        echo"The division of $num1 and $num2 is $ans";
        break;
    case'%':
        $ans=$num1%$num2;
        echo"The modulo of $num1 and $num2 is $ans";
        break;
    default: echo'Invalid Operation';
}