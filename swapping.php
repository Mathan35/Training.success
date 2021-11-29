<?php

$value_1 = 10;
$value_2 = 20;
$nxt = 0;
echo 'Before swapping'."\n"  ;
echo 'value_1 = '.$value_1."\n";
echo 'value_2 = '.$value_2."\n \n";
$nxt = $value_1;

$value_1 = $value_2;
$value_2 = $nxt;

echo 'After swapping'."\n";

echo 'value_1 = '.$value_1."\n";

echo 'value_2 = '.$value_2."\n";
?>