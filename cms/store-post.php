<?php
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $title = $_POST["title"];
    $content = $_POST["content"];
    $cate_id = $_POST["cate_id"];

    $filetype = $_FILES["cover"]["type"];
    switch($filetype){
        case "image/jpeg":
            $cover = md5(uniqid()).".jpg";
            break;
        case "image/png":
            $cover = md5(uniqid()).".png";
            break;
        case "image/gif":
            $cover = md5(uniqid()).".gif";
            break;
        default:
            echo "上傳錯誤，請使用正確的圖片檔案";
            return;
    }
    $tmp_name = $_FILES["cover"]["tmp_name"];
    $error = $_FILES["cover"]["error"];

    storePost($title,$content,$cate_id,$cover,$tmp_name,$error);
    header("Location:index.php");