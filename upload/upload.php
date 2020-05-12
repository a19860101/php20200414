<?php
    date_default_timezone_set("Asia/Taipei");
    try {
        include("pdo.php");
        $filetype = $_FILES["img"]["type"];
        switch($filetype){
            case "image/jpeg":
                $filename = md5(uniqid()).".jpg";
                break;
            case "image/png":
                $filename = md5(uniqid()).".png";
                break;
            case "image/gif":
                $filename = md5(uniqid()).".gif";
                break;
            default:
                echo "上傳錯誤，請使用正確的圖片檔案";
                return;
        }
        // $sql = "INSERT INTO gallery(name,create_at)VALUES(?,NOW())";
        $sql = "INSERT INTO gallery(name,create_at)VALUES(?,?)";
        $stmt = $pdo -> prepare($sql);
        $create_at = date("Y-m-d H:i:s");

        $filesize = $_FILES["img"]["size"] / 1024;
        $error = $_FILES["img"]["error"];
        $tmp_name = $_FILES["img"]["tmp_name"];

        $target = "images/".$filename;

        if($error == 0){
            if(move_uploaded_file($tmp_name,$target)){
                echo "檔案上傳成功";
                $stmt->execute([$filename,$create_at]);
                header("Refresh:5;url=index.php");
            }else{
                echo "上傳失敗";
            }
        }else{
            echo "上傳錯誤";
        }
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    // $filename = $_FILES["img"]["name"];
    
    