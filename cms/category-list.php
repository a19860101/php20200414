<?php
    require_once("backend/pdo.php");
?>
<?php include("template/header.php");?>
<?php include("template/nav.php");?>
<div class="container py-5">
    <div class="row">
        <div class="col-8">
            <form action="" method="post">
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="slug">英文標題</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                <input type="submit" class="btn btn-primary" value="新增分類" name="submit">
            </form>
        </div>
        <div class="col-4">
            <ul class="list-group">
            <?php foreach($rows_c as $row){ ?>
                <li class="list-group-item"><?php echo $row["title"];?></li>
            <?php }?>
            </ul>
        </div>
    </div>
</div>
<?php include("template/footer.php");?>
<?php
    if(isset($_POST["submit"])){
        $title = $_POST["title"];
        $slug = $_POST["slug"];
        storeCate($title,$slug);
        header("Location:category-list.php");
    }
?>