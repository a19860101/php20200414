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
            <div>
                <?php 
                    if($row["cover"] == ""){
                        echo "<img src='https://picsum.photos/id/".rand(1,100)."/800/400' class='w-100'>";
                    }else{
                        echo "<img src='images/{$row["cover"]}' class='w-100'>";
                    }
                ?>
            </div>
            <div>
                分類:<?php echo $row["c_title"];?>
            </div>
            <div class="content py-5">
                <?php echo $row["content"]?>
            </div>
            <div>
                作者:<?php echo $row["user"];?>
            </div>
            <div class="mb-3">
                <div>建立時間<?php echo $row["create_at"];?></div>
                <div>更新時間<?php echo $row["update_at"];?></div>
            </div>
            <a href="index.php" class="btn btn-primary btn-sm">回文章列表</a>
            <?php if($_SESSION){ ?>
            <?php if($row["user_id"] == $_SESSION["ID"]){ ?>
            <a href="edit-post.php?id=<?php echo $row["id"];?>" class="btn btn-success btn-sm">修改文章</a>
            <a href="delete-post.php?id=<?php echo $row["id"];?>&cover=<?php echo $row["cover"];?>" class="btn btn-danger btn-sm" onclick="return confirm('確認刪除?')">刪除文章</a>
            <?php }} ?>
        </div>
    </div>
</div>
<?php include("template/footer.php"); ?>