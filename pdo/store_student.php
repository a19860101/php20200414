<?php
    try{
        require_once("pdo.php");
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $mail = $_POST["mail"];
        $edu = $_POST["edu"];
        $gender = $_POST["gender"];
        $skills = implode(",",$_POST["skills"]);

        $sql = "INSERT INTO students(name,phone,mail,edu,gender,skills)VALUES(?,?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name,$phone,$mail,$edu,$gender,$skills]);

        header("location:index.php");

    }catch(PDOException $e){
        echo $e->getMessage();
    }