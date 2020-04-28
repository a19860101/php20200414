<?php
    require_once("conn.php");
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];

    $sql = "INSERT INTO students(name,phone,mail)VALUES('$name','$phone','$mail')";
    mysqli_query($conn,$sql);
    header("Location:index.php");