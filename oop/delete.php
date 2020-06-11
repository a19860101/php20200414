<?php
    include("pdo.php");
    include("Post.php");
    $post = new Post;
    $post->deletePost($_GET["id"],$_GET["cover"]);
    header("location:index.php");