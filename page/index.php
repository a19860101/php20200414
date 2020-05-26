<?php
    try {
        include('pdo.php');
        $sql = "SELECT * FROM posts";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $per = 4;
        $pages = ceil($total / $per);
        /*
            ceil,round,floor
        */
        if(!isset($_GET["page"])){
            $page = 1; //當前頁面
        }else{
            $page = $_GET["page"];
        }
        $start = ($page - 1) * $per;
        $sql = "SELECT * FROM posts LIMIT {$start},{$per}";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $rows = array();
        while($row=$stmt->fetch()){
            $rows[] = $row;
        }
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
    共<?php echo $total;?>筆資料
    <?php foreach($rows as $r){?>
        <h2><?php echo $r["title"];?></h2>
    <?php } ?>
    <?php if($page != 1){ ?>
    <a href="index.php?page=1">第一頁</a>
    <a href="index.php?page=<?php echo $page - 1;?>">上一頁</a>
    <?php } ?>
    <?php if($page != $pages){ ?>
    <a href="index.php?page=<?php echo $page + 1;?>">下一頁</a>
    <a href="index.php?page=<?php echo $pages; ?>">最末頁</a>
    <?php }?>
</body>
</html>