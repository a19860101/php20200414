<?php
    date_default_timezone_set("Asia/Taipei");
    function showAllPosts($order="DESC"){
        try {
            global $pdo;
            // $sql = "SELECT * FROM posts ORDER BY id {$order}";
            $sql = "SELECT posts.*,category.title AS c_title,category.slug,members.user 
                    FROM posts 
                    LEFT JOIN category 
                    ON posts.cate_id = category.id 
                    LEFT JOIN members
                    ON posts.user_id = members.id
                    ORDER BY id {$order}";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute(); 
            $row_array = array();
            while($rows = $stmt -> fetch()){
                $row_array[] = $rows;
            }
            return $row_array;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function showAllCatePosts($cate_id,$order="DESC"){
        try {
            global $pdo;
            // $sql = "SELECT * FROM posts ORDER BY id {$order}";
            $sql = "SELECT posts.*,category.title AS c_title,category.slug 
                    FROM posts 
                    LEFT JOIN category ON posts.cate_id = category.id 
                    WHERE posts.cate_id = ?
                    ORDER BY id {$order}";
            $stmt = $pdo -> prepare($sql);
            $stmt -> execute([$cate_id]); 
            $row_array = array();
            while($rows = $stmt -> fetch()){
                $row_array[] = $rows;
            }
            return $row_array;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function showPost($id){
        try {
            global $pdo;
            $sql = "SELECT posts.*,category.title AS c_title,category.slug,members.user 
                    FROM posts 
                    LEFT JOIN category ON posts.cate_id = category.id  
                    LEFT JOIN members ON posts.user_id = members.id  
                    WHERE posts.id = ?";
            $stmt = $pdo->prepare($sql); 
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            return $row;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function storePost($title,$content,$cate_id){
        session_start();
        try{
            global $pdo;
            $sql = "INSERT INTO posts(title,content,cate_id,create_at,update_at,cover,user_id)VALUES(?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $create_at = date("Y-m-d H:i:s");
            $cover = 0;
            $stmt->execute([$title,$content,$cate_id,$create_at,$create_at,$cover,$_SESSION['ID']]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function deletePost($id){
        try {
            global $pdo;
            $sql = "DELETE FROM posts WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function updatePost($title,$content,$cate_id,$id){
        try{
            global $pdo;
            $update_at = date("Y-m-d H:i:s");            
            $sql = "UPDATE 
            posts 
        SET 
            title       = ?,
            content     = ?,
            cate_id     = ?,
            update_at   = ?
        WHERE 
            id      = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title,$content,$cate_id,$update_at,$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }

    }
    function showAllPostsWithPage($per=3,$order="DESC"){
        try {
            global $pdo;
            $sql = "SELECT * FROM posts";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            $total = $stmt->rowCount();
            // $per = 2;
            $pages = ceil($total / $per);
            /*
                ceil,round,floor
            */
            if(!isset($_GET["page"])){
                $page = 1; //當前頁面
            }else{
                $page = $_GET["page"];
            }
            $start = ($page - 1) * $per;
            // $sql = "SELECT * FROM posts LIMIT {$start},{$per}";
            $sql = "SELECT posts.*,category.title AS c_title,category.slug,members.user 
                    FROM posts 
                    LEFT JOIN category 
                    ON posts.cate_id = category.id 
                    LEFT JOIN members
                    ON posts.user_id = members.id
                    ORDER BY id {$order}
                    LIMIT {$start},{$per}
                    ";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            $rows = array();
            while($row=$stmt->fetch()){
                $rows[] = $row;
            }
            return $rows;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function pager(){
       if($page != 1){
            echo "<a href='{$_SERVER["PHP_SELF"]}?page=1'>第一頁</a>";
            echo "<a href='{$_SERVER["PHP_SELF"]}?page={$page-1}'>上一頁</a>";
        }
       if($page != $pages){
            echo "<a href='{$_SERVER["PHP_SELF"]}?page={$page+1}'>下一頁</a>";
            echo "<a href='{$_SERVER["PHP_SELF"]}?page={$pages}'>最末頁</a>";
        }
    }