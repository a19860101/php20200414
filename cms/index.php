<?php 
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $rows = showAllPosts();
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <?php foreach($rows as $row){ ?>
            <h3><?php echo $row["title"];?></h3>
            <div class="content">
                <?php echo $row["content"];?>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>