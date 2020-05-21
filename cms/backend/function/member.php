<?php
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