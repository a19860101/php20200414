<?php
    session_start();
    $name = $_POST["name"];
    $_SESSION["USER"] = $name;
    header("Refresh:3;url=index.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?php echo $_SESSION["USER"]."你好";?></h1>
    <a href="logout.php">登出</a>
</body>
</html>