<?php
$value_2 = 0;
$input_number = '153'; 

$length = strlen($input_number);

for($n=0; $n<$length; $n++){
    $value_1 = $input_number[$n]*$input_number[$n]*$input_number[$n];
    
    $ans = $value_1+$value_2;

    $value_2 = $ans;

    echo $ans == $input_number? $input_number.' is Amstrong Number'."\n":' ';

}

?>