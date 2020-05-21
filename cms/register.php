<?php
    require_once("backend/pdo.php");
    include("backend/function/member.php");
    $user = $_POST["user"];
    $pw = $_POST["pw"];
    if($user == "" || $pw == ""){
        header("Location:index.php?user=0");
        // return;
    }else{
        storeMember($user,$pw);
        // echo "<script>alert('申請會員已完成，請重新登入')</script>";
        header("Refresh:3;url=login.php");
    }