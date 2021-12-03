<?php
$s_value = 10; 
$e_value = 20; 
$array = array();

for($m=$s_value; $m<=$e_value; $m++){

    for($k=1; $k<=$m; $k++){
     array_push($array,$k);
    }
     $ans = array_product($array);
     echo $ans."\n";
     $array = array();
     
}

?>
