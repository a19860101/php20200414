<?php
    function showAll(){
        try {
            require_once('pdo.php');
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
    function show($id){
        try {
            require_once("pdo.php");
            // $id = $_GET["id"];
            $sql = "SELECT * FROM students WHERE id = ?";
            $stmt = $pdo->prepare($sql); 
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            return $row;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function store($name,$phone,$mail,$edu,$gender,$skills){
        try{
            require_once("pdo.php");
            $sql = "INSERT INTO students(name,phone,mail,edu,gender,skills)VALUES(?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$name,$phone,$mail,$edu,$gender,$skills]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function delete($id){
        try {
            require_once("pdo.php");
            $sql = "DELETE FROM students WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function update($name,$phone,$mail,$edu,$gender,$skills,$id){
        try{
            require_once("pdo.php");
            $sql = "UPDATE 
            students 
        SET 
            name    = ?,
            phone   = ?,
            mail    = ?,
            edu     = ?,
            gender  = ?,
            skills  = ? 
        WHERE 
            id      = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name,$phone,$mail,$edu,$gender,$skills,$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }