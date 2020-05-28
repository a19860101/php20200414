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
    function storePost($title,$content,$cate_id,$cover,$tmp_name,$error){
        session_start();
        try{
            global $pdo;
            $sql = "INSERT INTO posts(title,content,cate_id,create_at,update_at,cover,user_id)VALUES(?,?,?,?,?,?,?)";
            $stmt = $pdo->prepare($sql);
            $create_at = date("Y-m-d H:i:s");
            $target = "images/{$cover}";
            if($error == 0){
                if(move_uploaded_file($tmp_name,$target)){
                    $stmt->execute([$title,$content,$cate_id,$create_at,$create_at,$cover,$_SESSION['ID']]);
                }else{
                    echo "圖片上傳錯誤，請重新上傳";
                }
            }else{
                echo "新增錯誤";
            }
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function deletePost($id,$cover){
        try {
            global $pdo;
            $sql = "DELETE FROM posts WHERE id = ?";
            if($cover!=0){
                unlink("images/{$cover}");
            }
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
    function pager($per=3){
        global $pdo;
        $sql = "SELECT * FROM posts";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $total = $stmt->rowCount();
        $pages = ceil($total / $per);
        if(!isset($_GET["page"])){
            $page = 1; //當前頁面
        }else{
            $page = $_GET["page"];
        }
        $next = $page+1;
        $prev = $page-1;
        
        echo "<ul class='pagination'>";
       if($page != 1){
            echo "<li class='page-item'><a href='{$_SERVER["PHP_SELF"]}?page=1' class='page-link'>第一頁</a></li>";
            echo "<li class='page-item'><a href='{$_SERVER["PHP_SELF"]}?page={$prev}' class='page-link'>上一頁</a></li>";
        }
        for($i=0;$i<$pages;$i++){
            $p = $i + 1;
            
            if($p == $page){
                echo "<li class='page-item active'><a href='#' class='page-link'> {$p} </a></li>";
            }else{
                echo "<li class='page-item'><a href='{$_SERVER["PHP_SELF"]}?page={$p}' class='page-link'>{$p}</a></li>";
            }
        }
       if($page != $pages){
            echo "<li class='page-item'><a href='{$_SERVER["PHP_SELF"]}?page={$next}' class='page-link'>下一頁</a></li>";
            echo "<li class='page-item'><a href='{$_SERVER["PHP_SELF"]}?page={$pages}' class='page-link'>最末頁</a></li>";
        }
        echo "</ul>";
    }