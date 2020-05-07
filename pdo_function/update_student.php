<?php
    include("function.php");
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $edu = $_POST["edu"];
    $gender = $_POST["gender"];
    $skills = implode(",",$_POST["skills"]);
    $id=$_POST["id"];
    update($name,$phone,$mail,$edu,$gender,$skills,$id);
    header("Location:index.php");
   