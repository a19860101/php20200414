<?php
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $row = showPost($_GET["id"]);
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>修改文章</h2>
            <form action="update-post.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="title">文章標題</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?php echo $row["title"];?>">
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" class="form-control" rows="10"><?php echo $row["content"];?></textarea>
                </div>
                <div class="form-group">
                    <label for="cate_id">分類</label>
                    <select name="cate_id" id="cate_id" class="form-control">
                        <?php foreach($rows_c as $row_c){ ?>
                        <option value="<?php echo $row_c["id"];?>" <?php echo $row_c["id"]==$row["cate_id"]?"selected":"";?>>
                            <?php echo $row_c["title"];?>
                        </option>
                        <?php } ?>
                    </select>
                </div>
                <div>
                    <?php if($row["cover"] == ""){ ?>
                        <input type="file" name="cover">
                    <?php }else{ ?>
                        <img src="thumbs/<?php echo $row["cover"];?>" width="200">
                        <a href="#" class="btn btn-danger btn-sm">刪除圖片</a>
                    <?php } ?>
                </div>
                <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                <input type="submit" value="修改文章" class="btn btn-primary">
                <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
            </form>
        </div>
    </div>
    
</div>
<?php include("template/footer.php"); ?>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content')
</script>