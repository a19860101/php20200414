<?php
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $title = $_POST["title"];
    $content = $_POST["content"];
    $id = $_POST["id"];
    updatePost($title,$content,$id);
    // header("Location:edit-post.php?id={$id}");
    header("Refresh:1;url=edit-post.php?id={$id}");
    echo "<script>alert('修改完成')</script>";