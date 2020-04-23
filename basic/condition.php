<?php
    //條件式 Condition

    $x = "basdg";

    // if($x > 0){
    //     echo "Success";
    // }

    // if($x > 0){
    //     echo "Success";
    // }else{
    //     echo "Failed!!";
    // }

    // $a = $x > 0 ? "Success":"Failed!!";
    // echo $a;
 
    // if($x > 0){
    //     echo "正數";
    // }elseif($x < 0){
    //     echo "負數";
    // }else{
    //     echo "零";
    // }
        switch($x){
            case "a":
                echo "a";
                break;
            case "b":
                echo "b";
                break;
            default:
                echo "DEFAULT";

        }
    // switch($x){
    //     case 0:
    //         echo "0";
    //         break;
    //     case 1:
    //         echo "1";
    //         break;
    //     case 2:
    //         echo "2";
    //         break;
    //     default:
    //         echo "ERROR!!";

    // }
    // switch(true){
    //     case $x > 0:
    //         echo "正數";
    //         break;
    //     case $x < 0:
    //         echo "負數";
    //         break;
    //     case $x == 0:
    //         echo "零";
    //         break;
    //     default:
    //         echo "ERROR";
    // }

