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
            <a href="delete.php?id=<?php echo $row["id"];?>&cover=<?php echo $row["cover"];?>" style="color:red" onclick="return confirm('確認刪除？')">刪除</a>
            <a href="edit.php?id=<?php echo $row["id"];?>" style="color:teal" >編輯</a>
        </h2>
    </div>
    <?php } ?>
</body>
</html>