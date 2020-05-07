<?php
    include("function.php");

    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $edu = $_POST["edu"];
    $gender = $_POST["gender"];
    $skills = implode(",",$_POST["skills"]);
    
    store($name,$phone,$mail,$edu,$gender,$skills);
    header("location:index.php");