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
}