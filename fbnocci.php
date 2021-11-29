<?php

$ans = 0;
$n = 0;
$m = 1;
echo $n."\n";
echo $m."\n";
while($m<15){
    $ans = $n+$m;
    echo $ans<15? $ans."\n":'';
    $n = $m;
    $m = $ans;

}

?>