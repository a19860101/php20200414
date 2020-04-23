<?php
    $db_host = "localhost";
    $db_user = "admin";
    $db_pw = "admin";
    $db_name = "php24";

    // $conn = @mysqli_connect($db_host,$db_user,$db_pw,$db_name)or die("資料庫連線錯誤");
    $conn = mysqli_connect($db_host,$db_user,$db_pw,$db_name)or die("資料庫連線錯誤");

    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql);

    var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>title</h1>
</body>
</html>