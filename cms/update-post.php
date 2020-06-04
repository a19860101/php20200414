<?php
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $title = $_POST["title"];
    $content = $_POST["content"];
    $cate_id = $_POST["cate_id"];
    $id = $_POST["id"];
    if($_FILES){
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
    }else{
        $cover = $_POST["cover"];
        $tmp_name = 0;
        $error = "";
        $filetype = "";

    }
   
    

    updatePost($title,$content,$cate_id,$id,$cover,$tmp_name,$error,$filetype);
    // header("Location:edit-post.php?id={$id}");
    header("Refresh:1;url=edit-post.php?id={$id}");
    echo "<script>alert('修改完成')</script>";