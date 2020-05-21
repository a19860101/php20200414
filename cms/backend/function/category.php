<?php
    date_default_timezone_set("Asia/Taipei");
    
    function showAllCate($order="DESC"){
        try {
            global $pdo;
            $sql = "SELECT * FROM category ORDER BY id {$order}";
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
    // function showPost($id){
    //     try {
    //         global $pdo;
    //         $sql = "SELECT * FROM posts WHERE id = ?";
    //         $stmt = $pdo->prepare($sql); 
    //         $stmt->execute([$id]);
    //         $row = $stmt->fetch();
    //         return $row;
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }
    function storeCate($title,$slug){
        try{
            global $pdo;
            $sql = "INSERT INTO category(title,slug,create_at)VALUES(?,?,?)";
            $stmt = $pdo->prepare($sql);
            $create_at = date("Y-m-d H:i:s");
            $stmt->execute([$title,$slug,$create_at]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    // function deletePost($id){
    //     try {
    //         global $pdo;
    //         $sql = "DELETE FROM posts WHERE id = ?";
    //         $stmt = $pdo->prepare($sql);
    //         $stmt->execute([$id]);
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }
    // function updatePost($title,$content,$id){
    //     try{
    //         global $pdo;
    //         $update_at = date("Y-m-d H:i:s");            
    //         $sql = "UPDATE 
    //         posts 
    //     SET 
    //         title       = ?,
    //         content     = ?,
    //         update_at   = ?
    //     WHERE 
    //         id      = ?";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute([$title,$content,$update_at,$id]);
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }

    // }