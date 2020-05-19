<?php 
    require_once("backend/pdo.php");
    include("backend/function/posts.php");
    $rows = showAllCatePosts($_GET["id"]);

?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>
<?php
  foreach($rows as $row){
      echo $row["title"];
      echo "<br>";
  }
?>
<?php include("template/footer.php"); ?>