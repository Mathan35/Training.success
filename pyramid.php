<?php

for($i=1;$i<=5;$i++){
    for($j=1;$j<=10;$j++){
        if(($i==1 && $j==5)
        | (($i==2)&&(($j==4)|($j==5)|($j==6) ))
        | (($i==3)&&(($j==3)|($j==4)|($j==5)|($j==6) |($j==7) ))
        | (($i==4)&&(($j==2)|($j==3)|($j==4)|($j==5)|($j==6) |($j==7)|($j==8) ))
        | (($i==5)&&(($j==1)|($j==2)|($j==3)|($j==4)|($j==5) |($j==6)|($j==7) |($j==8)|($j==9)))
        ){
        echo '*';
        }else{
            echo ' ';
        }
    }
    echo "\n";
 }

 ?>