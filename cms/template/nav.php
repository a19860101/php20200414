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
      <?php 
        if($_SESSION && $_SESSION["LEVEL"] == 0){ 
      ?>
      <li class="nav-item">
        <a class="nav-link" href="category-list.php">分類管理</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="member-list.php">會員管理</a>
      </li>
      <?php } ?>
      <?php foreach($rows_c as $row_c){ ?>
      <li class="nav-item">
        <a class="nav-link" href="category.php?id=<?php echo $row_c["id"];?>"><?php echo $row_c["title"];?></a>
      </li>
      <?php }?>
    </ul>
    <ul class="navbar-nav ml-auto">
    <?php if(!$_SESSION){ ?>
      <li class="nav-item active">
        <a class="nav-link" href="signup.php">註冊</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="login.php">登入</a>
      </li>
    <?php }else{ ?>
      <li class="nav-item">
        <a href="#" class="nav-link"><?php echo $_SESSION["USER"];?>你好!</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="create-post.php">新增文章</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php?logout=true">登出</a>
      </li>
    <?php } ?>
    <li class="nav-item">
      <a class="nav-link" href="contact.php">聯絡我們</a>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="search.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="搜尋" name="search">
      <input class="btn btn-outline-primary my-2 my-sm-0" type="submit" value="搜尋">
    </form>
  </div>
</nav>