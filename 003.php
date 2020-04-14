<?php
    //算術運算子
    $x = 10;
    $y = 16;

    var_dump($x + $y);
    echo "<br>";
    var_dump($x - $y);
    echo "<br>";
    var_dump($x * $y);
    echo "<br>";
    var_dump($x / $y);
    echo "<br>";
    var_dump($x % $y);
    echo "<br>";
    echo "<br>";
    
    //比較運算子
    var_dump($x > $y);
    echo "<br>";
    var_dump($x >= $y);
    echo "<br>";
    var_dump($x < $y);
    echo "<br>";
    var_dump($x <= $y);
    echo "<br>";
    var_dump($x == $y);
    echo "<br>";
    var_dump($x === $y);
    echo "<br>";
    var_dump($x != $y);
    echo "<br>";
    var_dump($x !== $y);
    echo "<br>";
    var_dump($x <> $y);
    echo "<br>";
    echo "<br>";
    
    //指定運算子
    var_dump($x += $y);
    echo "<br>";
    var_dump($x -= $y);
    echo "<br>";
    var_dump($x *= $y);
    echo "<br>";
    var_dump($x /= $y);
    echo "<br>";
    var_dump($x %= $y);
    echo "<br>";
    var_dump($x .= $y);
    echo "<br>";
    echo "<br>";

    //字串運算子
    var_dump($x.$y);
    echo "<br>";
    echo "<br>";

    //邏輯運算子
    $a = 0;
    $b = 1;
    var_dump(!isset($aasdgasd));
    //isset() 判斷變數是否存在
    var_dump($a > 0 && $b > 0);
    var_dump($a > 0 || $b > 0);
    var_dump($a >= 0 xor $b > 0);

    //三元運算子

    $x = -100;

    $y = $x > 0 ? "OK" : "NOT OK";

    echo $y;

?>