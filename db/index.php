<?php
    require_once("conn.php");
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql);
    // $row = mysqli_fetch_assoc($result);
    // // var_dump($result);
    // var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($result);
    // var_dump($row);
    // echo "<br>";
    // $row = mysqli_fetch_assoc($result);
    // var_dump($row);

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
                <h1>title</h1>
                <a href="create_student.php" class="btn btn-primary">新增資料</a>
                <table class="table">
                    <tr>
                        <th>#</th>
                        <th>姓名</th>
                        <th>Mail</th>
                        <th>電話</th>
                        <th></th>
                    </tr>
                <?php while($row = mysqli_fetch_assoc($result)){ ?>
                    <tr>
                        <td><?php echo $row["id"];?></td>
                        <td>
                            <a href="detail_student.php?id=<?php echo $row["id"];?>">
                                <?php echo $row["name"];?>
                            </a>
                        </td>
                        <td><?php echo $row["mail"];?></td>
                        <td><?php echo $row["phone"];?></td>
                        <td>
                            <a href="delete_student.php?id=<?php echo $row["id"];?>" class="btn btn-danger" onclick="return confirm('確認刪除?')">刪除</a>
                            <a href="edit_student.php?id=<?php echo $row["id"];?>" class="btn btn-info">修改</a>
                        </td>
                    </tr>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
        // while($row = mysqli_fetch_assoc($result)){
        //     echo "<tr>";
        //     echo "<td>".$row["id"]."</td>";
        //     echo "<td>".$row["name"]."</td>";
        //     echo "<td>".$row["mail"]."</td>";
        //     echo "<td>".$row["phone"]."</td>";
        //     echo "</tr>";
        // }
    ?>
    </table>
</body>
</html>