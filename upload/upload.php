<?php
    // $filename = $_FILES["img"]["name"];
    
    $filetype = $_FILES["img"]["type"];
    switch($filetype){
        case "image/jpeg":
            $filename = md5(uniqid()).".jpg";
            break;
        case "image/png":
            $filename = md5(uniqid()).".png";
            break;
        case "image/gif":
            $filename = md5(uniqid()).".gif";
            break;
        default:
            echo "上傳錯誤，請使用正確的圖片檔案";
            return;
    }

    $filesize = $_FILES["img"]["size"] / 1024;
    $error = $_FILES["img"]["error"];
    $tmp_name = $_FILES["img"]["tmp_name"];

    $target = "images/".$filename;

    if($error == 0){
        if(move_uploaded_file($tmp_name,$target)){
            echo "檔案上傳成功";
            header("Refresh:5;url=index.php");
        }else{
            echo "上傳失敗";
        }
    }else{
        echo "上傳錯誤";
    }