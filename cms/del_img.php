<?php
    require_once("backend/pdo.php");

    $id = $_GET["id"];
    $cover =$_GET["cover"];

    unlink("images/{$cover}");
    unlink("thumbs/{$cover}");

    $sql = "UPDATE posts SET cover=? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['',$id]);
    header("location:edit-post.php?id={$id}");