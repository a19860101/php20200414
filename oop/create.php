<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="store.php" method="post" enctype="multipart/form-data">
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
        <div class="form-group">
            <label for="cover">封面圖片</label>
            <input type="file" name="cover" id="cover">
        </div>
        <input type="submit" value="新增文章" class="btn btn-primary">
        <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
    </form>
</body>
</html>