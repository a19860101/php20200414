<?php include("template/header.php");?>
<?php include("template/nav.php");?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <h2>會員登入</h2>
        </div>
        <div class="col-md-8">
            <form action="auth.php" method="post">
                <div class="form-group">
                    <label for="user">帳號</label>
                    <input type="text" name="user" id="user" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pw">密碼</label>
                    <input type="password" name="pw" id="pw" class="form-control">
                </div>
                <input type="submit" value="登入" class="btn btn-primary">
            </form>
        </div>
    </div>
</div>
<?php include("template/footer.php");?>