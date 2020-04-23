<?php
    $a = ["HTML","CSS","JAVASCRIPT","PHP","MYSQL"];
    // $a = 100;
    $drinks = ["紅茶"=>20,"綠茶"=>20,"奶茶"=>30,"珍珠奶茶"=>40,"冰淇淋紅茶"=>50,"奶蓋紅茶"=>40];

    //in_array()

    // var_dump(in_array("CSS",$a));
    // if(in_array("CSS",$a)){
    //     echo "CSS存在";
    // }else{
    //     echo "CSS不存在";
    // }

    //is_array()

    // var_dump(is_array($a));
    // if(is_array($a)){
    //     echo "是個陣列";
    // }else{
    //     echo "不是個陣列";
    // }

    // 新增一個值到陣列最後
    array_push($a,"ASP.NET","SQL SERVER","VUE","REACT");

    // 移除最後一個陣列值
    // array_pop($a);

    // 新增一個值到陣列最前方
    // array_unshift($a,"QQQ");

    // 移除第一個陣列值
    // array_shift($a);
    
     // 新增一個值到陣列最後
    // $a[count($a)] = "123456";
    // $a[count($a)] = "qqq";
    // $a[count($a)] = "987";

    foreach($a as $item) {
        echo "<p>{$item}</p>";
    }

    $name = "John";
    $mail = "asdf@gmail.com";
    $phone = "0986543218";
    $age = "30";

    $result = compact("name","mail","phone","age");
    // echo $result;
    // var_dump($result);
    foreach($result as $key => $val){
        echo "{$key} : {$val} <br>";
    }

    //implode 集中 陣列->字串

    $a_str = implode("__",$a);
    echo $a_str;

    //explode 爆炸 字串->陣列
    $str = "籃球場上_被蓋火鍋_是常有的事";
    $str_array = explode("_",$str);
    // echo $str_array;
    // var_dump($str_array);
    foreach($str_array as $s){
        echo $s."<br>";
    }