<?php 
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $rows = showAllPostsWithPage(3,"DESC");
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>
<div class="container py-5">
    <div class="row justify-content-center">
        <?php foreach($rows as $row){ ?>
        <div class="col-8 py-2">
            <h3><?php echo $row["title"];?></h3>
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
            <div class="content">
                <?php echo mb_substr(strip_tags($row["content"]),0,120,"utf-8");?>...
            </div>
            <div class="text-right">
                <a href="post.php?id=<?php echo $row["id"];?>">繼續閱讀</a>
            </div>
            <div>
                作者:<?php echo $row["user"];?>
            </div>
            <div class="mt-3">
                發布時間: <?php echo $row["create_at"]; ?>
            </div>
            <hr>
        </div>
        <?php } ?>
        <div class="col-8">
        <?php echo pager(3); ?>
        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>