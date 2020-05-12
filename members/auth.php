<?php
    try{
        include("pdo.php");
        session_start();
        $user = $_POST["user"];
        $pw = $_POST["pw"];

        $sql = "SELECT * FROM members WHERE user = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user]);
        $row = $stmt->fetch();
        if($row["pw"] == $pw){
            $_SESSION["USER"] = $user;
            $_SESSION["ID"] = $row["id"];
            header("Location:index.php");
        }else{
            echo "帳號或密碼錯誤";
        }

        // var_dump($row);
    }catch(PDOException $e){
        echo $e->getMessage();
    }