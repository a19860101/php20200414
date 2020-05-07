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