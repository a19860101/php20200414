<?php
    // 陣列 Array
    // $a = array();
    // $a[0] = "HTML";
    // $a[1] = "CSS";
    // $a[2] = "JAVASCRIPT";
    // $a[3] = "PHP";

    // $a = array("A","B","C","D");

    $a = ["HTML","CSS","JAVASCRIPT","PHP","MYSQL"];

    // echo $a[0];
    // echo $a[1];
    // echo $a[2];
    // echo $a[3];
    // var_dump($a);

    // echo count($a);
    // sort($a);
    // rsort($a);
    shuffle($a);
    //迭代
    for($i=0;$i<count($a);$i++){
        echo $a[$i]."<br>";
    }
    // $drinks = ["紅茶","綠茶","奶茶","珍珠奶茶","冰淇淋紅茶"];
    $drinks = ["紅茶"=>20,"綠茶"=>20,"奶茶"=>30,"珍珠奶茶"=>40,"冰淇淋紅茶"=>50,"奶蓋紅茶"=>40];
    // foreach($drinks as $drink){
    //     echo $drink;
    // }
    // ksort($drinks);
    // asort($drinks);
    // krsort($drinks);
    // arsort($drinks);
    // foreach($drinks as $key=>$val){
    //    echo "{$key}:::::::{$val}元<br>";
    // }

    
