<?php 
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $rows = showAllPosts();
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>
<?php
    if($_SESSION){
        echo $_SESSION["USER"];
    }
?>
<div class="container py-5">
    <div class="row justify-content-center">
        <?php foreach($rows as $row){ ?>
        <div class="col-8 py-2">
            <h3><?php echo $row["title"];?></h3>
            <div>
                分類:<?php echo $row["c_title"];?>
            </div>
            <div class="content">
                <?php echo mb_substr($row["content"],0,120,"utf-8");?>...
            </div>
            <div class="text-right">
                <a href="post.php?id=<?php echo $row["id"];?>">繼續閱讀</a>
            </div>
            <div>
                作者:<?php echo $row["user_id"];?>
            </div>
            <div class="mt-3">
                發布時間: <?php echo $row["create_at"]; ?>
            </div>
            <hr>
        </div>
        <?php } ?>
    </div>
</div>

<?php include("template/footer.php"); ?>