<?php
    try {
        require_once('pdo.php');
        $sql = "SELECT * FROM students";
        //預備陳述式
        $stmt = $pdo -> prepare($sql);
        $stmt -> execute(); 
        $row_array = array();
        while($rows = $stmt -> fetch()){
            // var_dump($row);
            // echo $row["id"]."<br>";
            $row_array[] = $rows;
        }
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
                <h1>學生資料</h1>
                <a href="create_student.php">新增資料</a>
                <table class="table">
                <?php foreach($row_array as $row){?>
                    <tr>
                        <td><?php echo $row["id"];?></td>
                        <td>
                            <a href="detail_student.php?id=<?php echo $row["id"];?>">
                                <?php echo $row["name"];?>
                            </a>
                        </td>
                        <td><?php echo $row["mail"];?></td>
                        <td><?php echo $row["phone"];?></td>
                        <td><?php echo $row["gender"];?></td>
                        <td><?php echo $row["edu"];?></td>
                        <td><?php echo $row["skills"];?></td>
                        <td>
                            <a href="delete_student.php?id=<?php echo $row["id"];?>" class="btn btn-danger" onclick="return confirm('確認刪除?')">刪除</a>
                            <a href="edit_student.php?id=<?php echo $row["id"];?>" class="btn btn-info">修改</a>
                        </td>
                    </tr>
                <?php }?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>