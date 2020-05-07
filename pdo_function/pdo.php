<?php
    $db_host = "localhost";
    $db_user = "admin";
    $db_pw = "admin";
    $db_name = "php24";
    $db_charset = "utf8mb4";
    define("DB_USER","admin");
    define("DB_PW","admin");

    // $dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
    // $dsn = "mysql:host=localhost;dbname=php24;charset=utf8mb4";

    // $pdo = new PDO($dsn,DB_USER,DB_PW);

    //例外處理
    try {
        $dsn = "mysql:host={$db_host};dbname={$db_name};charset={$db_charset}";
        $pdo = new PDO($dsn,DB_USER,DB_PW);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }catch(PDOException $e){
        echo $e -> getMessage();
    }