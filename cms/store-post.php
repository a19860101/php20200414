<?php
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $title = $_POST["title"];
    $content = $_POST["content"];
    $cate_id = $_POST["cate_id"];
    storePost($title,$content,$cate_id);
    header("Location:index.php");