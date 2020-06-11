<?php
    include("pdo.php");
    include("Post.php");
    $post = new Post;
    $row = $post->showPost($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h2><?php echo $row["title"];?></h2>
        <div class="content">
        <?php echo $row["content"];?>
        </div>
        <div>
            建立時間:<?php echo $row["create_at"];?>
        </div>
        <div>
            最後更新時間：<?php echo $row["update_at"];?>
        </div>
    </div>
</body>
</html>