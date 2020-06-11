<?php
class Post extends DB {
    function showAllPosts($order="DESC"){
        try {
            $sql = "SELECT posts.*,category.title AS c_title,category.slug,members.user 
                    FROM posts 
                    LEFT JOIN category 
                    ON posts.cate_id = category.id 
                    LEFT JOIN members
                    ON posts.user_id = members.id
                    ORDER BY id {$order}";
            $stmt = $this -> connect() -> prepare($sql);
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
    function showPost($id){
        try {
            $sql = "SELECT posts.*,category.title AS c_title,category.slug,members.user 
                    FROM posts 
                    LEFT JOIN category ON posts.cate_id = category.id  
                    LEFT JOIN members ON posts.user_id = members.id  
                    WHERE posts.id = ?";
            $stmt = $this->connect()->prepare($sql); 
            $stmt->execute([$id]);
            $row = $stmt->fetch();
            return $row;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    function storePost($title,$content,$cate_id,$cover,$tmp_name,$error,$filetype){
        session_start();
        try{
            $sql = "INSERT INTO posts(title,content,cate_id,create_at,update_at,cover,user_id)VALUES(?,?,?,?,?,?,?)";
            $stmt = $this->connect()->prepare($sql);
            $create_at = date("Y-m-d H:i:s");
            $target = "images/{$cover}";
            $user_id = 0;
            //$_SESSION["ID"];
            if($error == 0){
                if(move_uploaded_file($tmp_name,$target)){
                    $stmt->execute([$title,$content,$cate_id,$create_at,$create_at,$cover,$user_id]);
                    // img($filetype,$target,$cover);
                    Post::img($filetype,$target,$cover);
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
            $sql = "DELETE FROM posts WHERE id = ?";
            if($cover!=0){
                unlink("images/{$cover}");
            }
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    static function img($filetype,$target,$cover){
        // $img = "images/001.jpg";
        switch($filetype){
            case "image/jpeg":
                $canvas = imagecreatefromjpeg($target);
                break;
            case "image/png":
                $canvas = imagecreatefrompng($target);
                break;
            case "image/gif":
                $canvas = imagecreatefromgif($target);
                break;
            default:
                echo "上傳錯誤，請使用正確的圖片檔案";
                return;
        }
        
        $canvas_w = imagesx($canvas);
        $canvas_h = imagesy($canvas);
        $new_w = 800;
        $new_h = $canvas_h / $canvas_w * 800;

        $new_canvas = imagecreatetruecolor($new_w,$new_h);
        imagecopyresampled($new_canvas,$canvas,0,0,0,0,$new_w,$new_h,$canvas_w,$canvas_h);

        // $new_name = uniqid().".jpg";
        switch($filetype){
            case "image/jpeg":
                imagejpeg($new_canvas,"thumbs/{$cover}");
                break;
            case "image/png":
                imagepng($new_canvas,"thumbs/{$cover}");
                break;
            case "image/gif":
                imagegif($new_canvas,"thumbs/{$cover}");
                break;
            default:
                echo "上傳錯誤，請使用正確的圖片檔案";
                return;
        }
        
        imagedestroy($new_canvas);
        imagedestroy($canvas);
    }
}