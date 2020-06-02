<?php
    $img = "images/001.jpg";

    $canvas = imagecreatefromjpeg($img);

    $canvas_w = imagesx($canvas);
    $canvas_h = imagesy($canvas);

    // var_dump($canvas_h,$canvas_w);

    // $new_w = $canvas_w / 2;
    // $new_h = $canvas_h / 2;

    // if($canvas_w > $canvas_h){
    //     $new_w = 600;
    //     $new_h = $canvas_h / $canvas_w * 600;
    // }else{
    //     $new_h = 600;
    //     $new_w = $canvas_w / $canvas_h * 600;
    // }
    $new_w = 600;
    $new_h = $canvas_h / $canvas_w * 600;
    

    var_dump($new_w,$new_h);

    $new_canvas = imagecreatetruecolor($new_w,$new_h);
    imagecopyresampled($new_canvas,$canvas,0,0,0,0,$new_w,$new_h,$canvas_w,$canvas_h);

    $new_name = uniqid().".jpg";
    imagejpeg($new_canvas,"thumbs/{$new_name}");


    imagedestroy($new_canvas);
    imagedestroy($canvas);