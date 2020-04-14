<?php
    //條件式 Condition

    $x = 0;

    if($x > 0){
        echo "Success";
    }

    if($x > 0){
        echo "Success";
    }else{
        echo "Failed!!";
    }

    $a = $x > 0 ? "Success":"Failed!!";
    echo $a;
 
    if($x > 0){
        echo "正數";
    }elseif($x < 0){
        echo "負數";
    }else{
        echo "零";
    }
