<?php
    try{
        include("pdo.php");
        $user = $_POST["user"];
        $pw = $_POST["pw"];
        $create_at = date("Y-m-d H:i:s");
        $sql = "INSERT INTO members(user,pw,create_at,update_at)VALUES(?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$user,$pw,$create_at,$create_at]);
        header("Location:login.php");
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }