<?php
    date_default_timezone_set("Asia/Taipei");
    try{
        include("pdo.php");
        $user = $_POST["user"];
        $pw = $_POST["pw"];
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