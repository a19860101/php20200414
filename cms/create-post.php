<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>
<div class="container my-5">
    <div class="row">
        <div class="col-12">
            <h2>新增文章</h2>
            <form action="store-post.php" method="post">
                <div class="form-group">
                    <label for="title">文章標題</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" class="form-control" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="cate_id">分類</label>
                    <select name="cate_id" id="cate_id" class="form-control">
                    <?php foreach($rows_c as $row_c){ ?>
                        <option value="<?php echo $row_c["id"]?>"><?php echo $row_c["title"]?></option>
                    <?php } ?>
                    </select>
                </div>
                <input type="submit" value="新增文章" class="btn btn-primary">
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