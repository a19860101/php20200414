<?php
    try {
        include('pdo.php');
        $sql = "SELECT * FROM posts";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $per = 3;
        $pages = ceil($total / $per);
        /*
            ceil,round,floor
        */
        $page = 1;
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <a href="index.php?page=<?php echo $page - 1;?>">上一頁</a>
    <a href="index.php?page=<?php echo $page + 1;?>">下一頁</a>
</body>
</html>