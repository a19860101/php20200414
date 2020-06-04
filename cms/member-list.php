<?php
    require_once("backend/pdo.php");
    include("backend/function/member.php");
    include("backend/function/verify.php");
    $rows = showAllMembers();

    if(isset($_GET["level"])){
        changeLevel($_GET["level"],$_GET["id"]);
        header("location:member-list.php");
    }
?>
<?php include("template/header.php"); ?>
<?php include("template/nav.php"); ?>
<?php checkMember();?>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>使用者名稱</th>
                    <th>申請時間</th>
                    <th>權限</th>
                </tr>
                <?php foreach($rows as $row){ ?>
                <tr>
                    <td><?php echo $row["id"];?></td>
                    <td><?php echo $row["user"];?></td>
                    <td><?php echo $row["create_at"];?></td>
                    <td>
                        <?php if($row["level"]==0){ ?>
                        管理員
                        <?php }else{ ?>
                        一般會員
                        <?php } ?>
                        <a href="?level=<?php echo $row["level"];?>&id=<?php echo $row["id"];?>" class="btn btn-primary btn-sm">切換權限</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
<?php include("template/footer.php"); ?>
<?php

?>