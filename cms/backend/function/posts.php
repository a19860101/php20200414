<?php
    date_default_timezone_set("Asia/Taipei");
    
    function showAllPosts($order="DESC"){
        try {
            global $pdo;
            // $sql = "SELECT * FROM posts ORDER BY id {$order}";
            $sql = "SELECT posts.*,category.title AS c_title,category.slug FROM posts LEFT JOIN category ON posts.cate_id = category.id";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute(); 
            $row_array = array();
            while($rows = $stmt -> fetch()){
                $row_array[] = $rows;
            }
            return $row_array;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function showPost($id){
        try {
            global $pdo;
            $sql = "SELECT * FROM posts WHERE id = ?";
            $stmt = $pdo->prepare($sql); 
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            return $row;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function storePost($title,$content){
        try{
            global $pdo;
            $sql = "INSERT INTO posts(title,content,create_at,update_at,cover)VALUES(?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $create_at = date("Y-m-d H:i:s");
            $cover = 0;
            $stmt->execute([$title,$content,$create_at,$create_at,$cover]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function deletePost($id){
        try {
            global $pdo;
            $sql = "DELETE FROM posts WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function updatePost($title,$content,$id){
        try{
            global $pdo;
            $update_at = date("Y-m-d H:i:s");            
            $sql = "UPDATE 
            posts 
        SET 
            title       = ?,
            content     = ?,
            update_at   = ?
        WHERE 
            id      = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title,$content,$update_at,$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }