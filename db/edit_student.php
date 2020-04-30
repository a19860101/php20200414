<?php
    require_once("conn.php");
    $id = $_GET["id"];
    $sql = "SELECT * FROM students WHERE id = ".$id;
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
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