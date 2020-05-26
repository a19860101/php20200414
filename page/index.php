<?php
    try {
        include('pdo.php');
        $sql = "SELECT * FROM posts";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $per = 2;
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
    <style>
        .active {
            font-size: 1.5em;
            color: red;
        }
    </style>
</head>
<body>
    共<?php echo $total;?>筆資料
    <div>
        目前頁數: <?php echo $page;?>
    </div>
    <?php foreach($rows as $r){?>
        <h2><?php echo $r["title"];?></h2>
    <?php } ?>
    <?php if($page != 1){ ?>
    <a href="<?php echo $_SERVER["PHP_SELF"];?>?page=1">第一頁</a>
    <a href="<?php echo $_SERVER["PHP_SELF"];?>?page=<?php echo $page - 1;?>">上一頁</a>
    <?php } ?>
    <?php
        for($i=0;$i<$pages;$i++){
            $p = $i + 1;
            
            if($p == $page){
                echo "<span class='active'> {$p} </span>";
            }else{
                echo "<a href='{$_SERVER["PHP_SELF"]}?page={$p}'> {$p} </a>";
            }
        }
    ?>
    <?php if($page != $pages){ ?>
    <a href="<?php echo $_SERVER["PHP_SELF"];?>?page=<?php echo $page + 1;?>">下一頁</a>
    <a href="<?php echo $_SERVER["PHP_SELF"];?>?page=<?php echo $pages; ?>">最末頁</a>
    <?php }?>
</body>
</html>