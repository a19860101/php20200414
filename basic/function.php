<?php
    function test(){
        $a = 100;
        echo $a;
    }
    // test();
    function test2(){
        $a = 999;
        $b = 1.5;
        $c = $a * $b;
        return $c;
    }
    // test();
    // test2();
    // var_dump(test2());
    // echo test2();
    // $c = test2();
    // echo $c;

    function test3($x,$y){
        return $x * $y;
    }

    echo test3(10,1.5);
