<?php
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    deletePost($_GET["id"]);

    header("Location:index.php");