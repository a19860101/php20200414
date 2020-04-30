<?php
    require_once("conn.php");
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $edu = $_POST["edu"];
    $gender = $_POST["gender"];
    $skills = implode(",",$_POST["skills"]);


    $sql = "INSERT INTO students(name,phone,mail,edu,gender,skills)VALUES('$name','$phone','$mail','$edu','$gender','$skills')";
    mysqli_query($conn,$sql);
    header("Location:index.php");