<?php
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $search = $_GET["search"];
    $rows = search($search);

?>
<?php include("template/header.php");?>
<?php include("template/nav.php");?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <?php foreach($rows as $row){ ?>
            <h2><?php echo $row["title"];?></h2>
            <hr>
            <?php } ?>
        </div>
    </div>
</div>
<?php include("template/footer.php");?>