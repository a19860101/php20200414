<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <?php if($_SESSION){ ?>
        
        <a href="logout.php">登出</a>
        
        <?php }else{ ?>

        <a href="#">註冊</a>
        <a href="login.php">登入</a>

        <?php } ?>
    </nav>
    <div class="container">
    <?php if($_SESSION){ ?>
        <h2><?php echo $_SESSION["USER"]."你好"; ?></h2>
    <?php }else{ ?>
        <h2>訪客你好</h2>
    <?php } ?>
    </div>
</body>
</html>