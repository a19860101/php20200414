<?php
    include("pdo.php");
    include("Post.php");
    $posts = new Post;
    $rows = $posts->showAllPosts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="create.php">新增文章</a>
    <?php foreach($rows as $row){ ?>
    <div>
        <h2>
            <a href="detail.php?id=<?php echo $row["id"];?>">
                <?php echo  $row["title"];?>
            </a>
        </h2>
    </div>
    <?php } ?>
</body>
</html>