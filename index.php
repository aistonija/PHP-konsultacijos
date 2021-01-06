<?php

# https://www.elated.com/php-references/

$myNum = 5;
print 'My number is: ' . $myNum;

function addFive($num)
{
    return $num += 5;
}

var_dump(addFive($myNum));

print 'My number after calling function addFive(): ';
var_dump($myNum);


function addTen(&$num)
{
    return $num += 10;
}

var_dump(addTen($myNum));
print 'My number after calling function addTen(): ';
var_dump($myNum);