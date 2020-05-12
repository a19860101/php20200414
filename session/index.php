<?php
    session_start();
    // $_SESSION["USER"] = "MARY";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <input type="text" name="name">
        <input type="submit" value="登入">
    </form>
    <a href="logout.php">登出</a>
    <br>
    <br>
    <?php
        if($_SESSION){
            echo $_SESSION["USER"]."你好";
        }
    ?>
</body>
</html>