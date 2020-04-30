<?php
    require_once("conn.php");
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $mail = $_POST["mail"];
    $edu = $_POST["edu"];
    $gender = $_POST["gender"];
    $skills = implode(",",$_POST["skills"]);
    $id = $_POST["id"];

    $sql = "UPDATE 
                students 
            SET 
                name    ='$name',
                phone   ='$phone',
                mail    ='$mail' ,
                edu     ='$edu',
                gender  ='$gender',
                skills  ='$skills'
            WHERE 
                id      =".$id;
    mysqli_query($conn,$sql);
    header("Location: index.php");