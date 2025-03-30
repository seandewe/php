<?php

function collatz ($num){


       if ($num <= 0){
        echo"please enter a positive integer";
        return;
       }
       echo "Collatz sequence for $num is : ";
       while ($num != 1) {
        echo $num . " ";
        if ($num % 2 == 0) {
            $num = $num / 2;
        } else {
            $num = $num * 3 + 1;
        }
    }
    
    echo "1";
} 
 $num = 9;
 collatz($num)

?>