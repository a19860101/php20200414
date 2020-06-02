<?php

    #建立600 * 400 畫布
    $width = 600;
    $height = 400;
    $canvas = imagecreatetruecolor($width,$height);

    // var_dump($canvas);
    #設定色彩
    $black = imagecolorallocate($canvas,0,0,0);
    $white = imagecolorallocate($canvas,255,255,255);
    $red = imagecolorallocate($canvas,255,0,0);
    $green = imagecolorallocate($canvas,0,255,0);
    $blue = imagecolorallocate($canvas,0,0,255);

    
    
    #填滿顏色
    imagefill($canvas,0,0,$red);
    
    #建立線條
    // imageline($canvas,0,0,200,200,$white);
    imageline($canvas,0,0,600,400,$white);
    imageline($canvas,600,0,0,400,$green);

    #建立文字
    imagestring($canvas,6,110,100,"hello",$white);
    #輸出
    header("Content-type: image/jpeg");
    imagejpeg($canvas);