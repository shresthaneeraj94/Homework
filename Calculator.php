<?php
/**
 * Created by PhpStorm.
 * User: Neeraj Shrestha
 * Date: 2017-12-31
 * Time: 8:03 AM
 */
$num1=$_POST["num1"];
$num2=$_POST["num2"];
$operator=$_POST["operator"];
switch ($operator){
    case 'plus':
        $sum=$num1+$num2;
        echo "The sum of $num1 and $num2 is $sum";
        header('Refresh: 10; URL=Calculator.html');
        break;
    case 'minus':
        $diff=$num1-$num2;
        echo "The differnce of $num1 and $num2 is $diff";
        header('Refresh: 10; URL=Calculator.html');
        break;
    case 'multiply':
        $product=$num1*$num2;
        echo "The product of $num1 and $num2 is $product";
        header('Refresh: 10; URL=Calculator.html');
        break;
    case 'divide':
        $div=$num1/$num2;
        echo "The result of division of  $num1 by $num2 is $div";
        header('Refresh: 10; URL=Calculator.html');
        break;
    case 'modulo':
        $result=$num1%$num2;
        echo "The remainder of $num1 divided by $num2 is $result";
        header('Refresh: 10; URL=Calculator.html');
        break;
}

