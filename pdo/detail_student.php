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
                <h2><?php echo $row["name"];?></h2>
                <ul>
                    <li>MAIL: <?php echo $row["mail"];?></li>
                    <li>電話: <?php echo $row["phone"];?></li>
                    <li>教育程度: <?php echo $row["edu"];?></li>
                    <li>性別: <?php echo $row["gender"];?></li>
                    <li>技能: <?php echo $row["skills"];?></li>
                </ul>
                <a href="#" class="btn btn-primary" onclick="history.back()">回上頁</a>
            </div>
        </div>
    </div>
</body>
</html>