<?php
    try {
        require_once("pdo.php");
        $id = $_GET["id"];
        $sql = "SELECT * FROM students WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="update_student.php" method="post">
                    <div class="form-group">
                        <label for="name">姓名</label>
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo $row["name"];?>">
                    </div>
                    <div class="form-group">
                        <label for="phone">電話</label>
                        <input type="text" id="phone" name="phone" class="form-control" value="<?php echo $row["phone"];?>">
                    </div>
                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="text" id="mail" name="mail" class="form-control" value="<?php echo $row["mail"];?>">
                    </div>
                    <div class="form-group">
                        <label for="edu">學歷</label>
                        <select name="edu" id="edu" class="form-control">
                            <option value="">請選擇</option>
                            <option value="國小"<?php echo $row["edu"]=="國小"? "selected":"";?>>國小</option>
                            <option value="國中"<?php echo $row["edu"]=="國中"? "selected":"";?>>國中</option>
                            <option value="高中職"<?php echo $row["edu"]=="高中職"? "selected":"";?>>高中職</option>
                            <option value="大專院校"<?php echo $row["edu"]=="大專院校"? "selected":"";?>>大專院校</option>
                            <option value="研究所以上"<?php echo $row["edu"]=="研究所以上"? "selected":"";?>>研究所以上</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>性別</div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="男" <?php echo $row["gender"]=="男"? "checked":"";?>>
                            <label for="male" class="form-check-label">男性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="女" <?php echo $row["gender"]=="女"? "checked":"";?>>
                            <label for="female" class="form-check-label">女性</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>專長</div>
                        <?php $skills = explode(",",$row["skills"]);?>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" name="skills[]" id="graphic" value="平面設計" <?php echo in_array("平面設計",$skills)?"checked":"";?>>
                            <label for="graphic" class="form-check-label">平面設計</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" name="skills[]" id="web" value="網頁設計" <?php echo in_array("網頁設計",$skills)?"checked":"";?>>
                            <label for="web" class="form-check-label">網頁設計</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" name="skills[]" id="threeD" value="3D設計" <?php echo in_array("3D設計",$skills)?"checked":"";?>>
                            <label for="threeD" class="form-check-label">3D設計</label>
                        </div>
                        
                    </div>
                    <input type="hidden" name="id" value="<?php echo $row["id"];?>">
                    <input type="submit" class="btn btn-primary" value="修改">
                    <!-- <input type="button" class="btn btn-danger" value="取消" onclick="history.back()"> -->
                    <input type="button" class="btn btn-danger" value="取消" onclick="location.href='index.php'">
                </form>
            </div>
        </div>
    </div>
</body>
</html>