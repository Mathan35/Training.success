<?php

$s_value = 10;
$e_value = 20;

for($value=$s_value; $value<=$e_value; $value++){
    
    for($m=2; $m<$e_value; $m++){

        if($value%$m != 0){
            echo $value."\n";
            break;
        }
        else{
            break;
        }
    
    }

}

?>