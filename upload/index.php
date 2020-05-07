<?php
    $current_dir = "images";
    $dir = opendir($current_dir);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,td,th {
            border: 1px solid #666;
            border-collapse: collapse;
            padding: 5px;
        }
    </style>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" value="上傳">
    </form>
    <br>
    <br>
    <a href="?new=true">新增檔案</a>
    <br>
    <br>
    <table>
    <?php while($file = readdir($dir)){ ?>
        <tr>
            <td>
                <a href="<?php echo "{$current_dir}/{$file}"?>"><?php echo $file; ?></a>
            </td>
            <td>
                <a href="?del=<?php echo "{$current_dir}/{$file}";?>" onclick="return confirm('確認刪除？')">刪除</a>
            </td>
        </tr>
    <?php } ?>
    </table>
    <?php
        if(isset($_GET["del"])){
            unlink($_GET["del"]);
            header("location:index.php");
        }
        if(isset($_GET["new"])){
            $name = md5(uniqid());
            touch("images/{$name}.txt");
            header("location:index.php?");
        }
    ?>
</body>
</html>