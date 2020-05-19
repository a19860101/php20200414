<?php 
  require_once("backend/pdo.php");
  include("backend/function/category.php");
  $rows_c = showAllCate();

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">QWERTY</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">首頁 <span class="sr-only">(current)</span></a>
      </li>
      <?php foreach($rows_c as $row_c){ ?>
      <li class="nav-item">
        <a class="nav-link" href="#"><?php echo $row_c["title"];?></a>
      </li>
      <?php }?>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">註冊</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">登入</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create-post.php">新增文章</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">會員專區</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">登出</a>
      </li>
    </ul>
  </div>
</nav>