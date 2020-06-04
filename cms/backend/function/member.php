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
                $_SESSION["LEVEL"] = $row["level"];
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
        try{
            global $pdo;
            $create_at = date("Y-m-d H:i:s");
    
            $sql_check = "SELECT * FROM members WHERE user = ?";
            $stmt_check = $pdo->prepare($sql_check);
            $stmt_check->execute([$user]);
    
            // $row_check = $stmt_check->fetch();
            // if($row_check["user"] == $user){
            //     echo "帳號已被使用";
            // }
    
            $row_count = $stmt_check->rowCount();
            echo $row_count;
            if($stmt_check->rowCount() > 0){
                echo "帳號已被使用";
            }else{
                $sql = "INSERT INTO members(user,pw,create_at,update_at)VALUES(?,?,?,?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$user,$pw,$create_at,$create_at]);
                header("Refresh:3;url=index.php");
                echo "申請成功，請重新登入!";
            }
    
    
    
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function showAllMembers(){
        try {
            global $pdo;
            $sql = "SELECT * FROM members";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $rows = array();
            while($row = $stmt->fetch()){
                $rows[] = $row;
            }
            return $rows;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }