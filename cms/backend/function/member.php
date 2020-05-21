<?php
    date_default_timezone_set("Asia/Taipei");
    function auth($user,$pw){
        try{
            global $pdo;
            session_start();
    
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
    }
    function storeMember($user,$pw){
        try {
            global $pdo;
            $create_at = date("Y-m-d H:i:s");
            $sql = "INSERT INTO members (user,pw,create_at,update_at)VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$user,$pw,$create_at,$create_at]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }