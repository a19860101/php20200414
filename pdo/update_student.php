<?php
    try{
        require_once("pdo.php");
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $mail = $_POST["mail"];
        $edu = $_POST["edu"];
        $gender = $_POST["gender"];
        $skills = implode(",",$_POST["skills"]);
        $id=$_POST["id"];

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
        header("Location:index.php");
    }catch(PDOException $e){
        echo $e->getMessage();
    }