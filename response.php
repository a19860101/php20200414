<?php

    // if($_POST){
    //     // var_dump($_POST);
    //     echo $_POST["name"];
    //     echo "<br>";
    //     echo $_POST["mail"];
    // }
    // if($_GET){
    //     echo $_GET["name"];
    //     echo "<br>";
    //     echo $_GET["mail"];
    // }

    // if($_POST["name"] == ""){
    //     echo "錯誤";
    // }
    if(empty($_POST["name"])){
        // echo "錯誤";
        header("location:form.php?err=1");
    }else{
        $name = $_POST["name"];
        echo "姓名:{$name}";
        echo "<br>";
    }
    
    if(empty($_POST["mail"])){
        // echo "請輸入email";
        header("location:form.php?err=2");
    }else{
        $mail = $_POST["mail"];
        echo "Mail:{$mail}";
        echo "<br>";
    }

    if(empty($_POST["gender"])){
        // echo "請選擇性別";
        header("location:form.php?err=3");
    }else{
        $gender = $_POST["gender"];
        echo "性別:{$gender}";
        echo "<br>";
    }
    if(empty($_POST["edu"])){
        // echo "請選擇學歷";
        header("location:form.php?err=4");
    }else{
        $edu = $_POST["edu"];
        echo "學歷:{$edu}";
        echo "<br>";
    }

    // 
    //可以使用!isset 與 empty
    if(empty($_POST["hobby"])){
        // echo "請選擇興趣";
        header("location:form.php?err=5");
    }else{
        $hobbys = $_POST["hobby"];
        $hobby = implode(",",$hobbys);
        echo "興趣:{$hobby}";
        echo "<br>";

    }
    $comment = $_POST["comment"];
    echo "評論:{$comment}";
    
    echo  "<script>alert('感謝填寫')</script>";
    // echo "興趣:";
    // foreach($hobbys as $hobby){
    //     echo "{$hobby},";
    // }
    //
    // echo "<br>";
    // echo "評論:{$comment}";
