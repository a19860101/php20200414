<?php 
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $row = showPost($_GET["id"]);
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-10 py-3">
            <h2><?php echo $row["title"];?></h2>
            <div class="content py-5">
                <?php echo $row["content"]?>
            </div>
            <div>
                作者:<?php echo $row["user_id"];?>
            </div>
            <div class="mb-3">
                <div>建立時間<?php echo $row["create_at"];?></div>
                <div>更新時間<?php echo $row["update_at"];?></div>
            </div>
            <a href="index.php" class="btn btn-primary btn-sm">回文章列表</a>
            <a href="delete-post.php?id=<?php echo $row["id"];?>" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除?')">刪除文章</a>
        </div>
    </div>
</div>
<?php include("template/footer.php"); ?>