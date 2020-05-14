<?php
    date_default_timezone_set("Asia/Taipei");
    function showAll(){
        try {
            require_once('../pdo.php');
            $sql = "SELECT * FROM students";
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
    // function show($id){
    //     try {
    //         require_once("pdo.php");
    //         // $id = $_GET["id"];
    //         $sql = "SELECT * FROM students WHERE id = ?";
    //         $stmt = $pdo->prepare($sql); 
    //         $stmt->execute([$id]);
    //         $row = $stmt->fetch();
    //         return $row;
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }
    function storePost($title,$content){
        try{
            require_once("backend/pdo.php");
            $sql = "INSERT INTO posts(title,content,create_at,update_at)VALUES(?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $create_at = date("Y-m-d H:i:s");
            $stmt->execute([$title,$content,$create_at,$create_at]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    // function delete($id){
    //     try {
    //         require_once("pdo.php");
    //         $sql = "DELETE FROM students WHERE id = ?";
    //         $stmt = $pdo->prepare($sql);
    //         $stmt->execute([$id]);
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }
    // }
    // function update($name,$phone,$mail,$edu,$gender,$skills,$id){
    //     try{
    //         require_once("pdo.php");
    //         $sql = "UPDATE 
    //         students 
    //     SET 
    //         name    = ?,
    //         phone   = ?,
    //         mail    = ?,
    //         edu     = ?,
    //         gender  = ?,
    //         skills  = ? 
    //     WHERE 
    //         id      = ?";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute([$name,$phone,$mail,$edu,$gender,$skills,$id]);
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //     }

    // }