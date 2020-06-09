<?php include("template/header.php");?>
<?php include("template/nav.php");?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <form action="mail.php" method="post">
                <div class="form-group">
                    <label for="subject">主旨</label>
                    <input type="text" name="subject" id="subject" class="form-control">
                </div>
                <div class="form-group">
                    <label for="mail">Mail</label>
                    <input type="text" name="mail" id="mail" class="form-control">
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" class="form-control" rows="10"></textarea>
                </div>               
                <input type="submit" value="送出" class="btn btn-primary">
                <input type="button" value="取消" class="btn btn-danger" onclick="history.back()">
            </form>
        </div>
    </div>
</div>
<?php include("template/footer.php");?>