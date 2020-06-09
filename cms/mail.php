<?php
    $subject = $_POST["subject"];
    $content = $_POST["content"];

    //收件人
    $to = "a19860101@gmail.com";

    //寄件人
    $mail = $_POST["mail"];


    if(mail($to,$subject,$content,$mail)){
        echo "<script>alert('訊息已寄出')</script>";
       
    }else{
        echo "<script>alert('發送失敗')</script>";
    }
    header("Refresh:0;url=contact.php");
