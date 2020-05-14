<?php 
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $rows = showAllPosts();
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <?php foreach($rows as $row){ ?>
        <div class="col-8 py-2">
            <h3><?php echo $row["title"];?></h3>
            <div class="content">
                <?php echo $row["content"];?>
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