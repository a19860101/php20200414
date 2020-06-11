<?php
    include("pdo.php");
    $pdo = new DB();
    $id = $_GET["id"];
    $cover =$_GET["cover"];

    unlink("images/{$cover}");
    unlink("thumbs/{$cover}");

    $sql = "UPDATE posts SET cover=? WHERE id = ?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute(['',$id]);
    header("location:edit.php?id={$id}");