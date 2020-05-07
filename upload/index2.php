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
<table>
    <?php
        $files = glob("images/*");
        // var_dump($dir);
        $file_num = count($files);
        // echo $file_num;
        if($file_num == 0){
            echo "目前沒有圖片";
        }else{
            echo "目前共有{$file_num}個檔案";
        }
        foreach($files as $file){
    ?>
    <tr>
        <td>
            <a href="<?php echo $file;?>">
                <img src="<?php echo $file;?>" height="100">
            </a>
        </td>
        <td>
        <a href="?del=<?php echo $file;?>" onclick="return confirm('確認刪除？')">刪除</a>

        </td>
    </tr>
    <?php } ?>
    </table>
    <?php
        if(isset($_GET["del"])){
            unlink($_GET["del"]);
            header("location:index2.php");
        }
    ?>
</body>
</html>