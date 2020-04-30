<?php
    require_once("conn.php");
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $id = $_POST["id"];

    $sql = "UPDATE 
                students 
            SET 
                name    ='$name',
                phone   ='$phone',
                mail    ='$mail' 
            WHERE 
                id      =".$id;
    mysqli_query($conn,$sql);
    header("Location: index.php");