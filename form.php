<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>
<body>
    

    
    <form action="response.php" method="post">
        <div>
            <label for="">姓名</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="">Mail</label>
            <input type="text" name="mail">
        </div>
        <div>
            <label for="">男</label>
            <input type="radio" name="gender" value="男">
            <label for="">女</label>
            <input type="radio" name="gender" value="女">
            <label for="">不透漏</label>
            <input type="radio" name="gender" value="不透漏">
        </div>
        <div>
            <label for="">學歷</label>
            <select name="edu" id="">
                <option value="">請選擇</option>
                <option value="國小">國小</option>
                <option value="國中">國中</option>
                <option value="高中職">高中職</option>
                <option value="大專院校">大專院校</option>
                <option value="研究所以上">研究所以上</option>
            </select>
        </div>
        <div>
            <label for="">平面設計</label>
            <input type="checkbox" name="hobby[]" value="平面設計">
            <label for="">網頁設計</label>
            <input type="checkbox" name="hobby[]" value="網頁設計">
            <label for="">3D設計</label>
            <input type="checkbox" name="hobby[]" value="3D設計">
        </div>
        <div>
            <label for="">評論</label>
            <textarea name="comment" id="" cols="30" rows="10"></textarea>
        </div>
        <div>
            <input type="submit" value="送出">
        </div>
    </form>
    <!-- <form action="response.php" method="get">
        <div>
            <input type="text" name="name">
        </div>
        <div>
            <input type="text" name="mail">
        </div>
        <div>
            <input type="submit" value="送出">
        </div>
    </form> -->
    <?php
        if($_GET){
            echo "<div class='error'>";
            switch($_GET["err"]){
                case 1:
                    echo "請輸入姓名";
                    break;
                case 2:
                    echo "請輸入Mail";
                    break;
                case 3:
                    echo "請選擇性別";
                    break;
                case 4:
                    echo "請選擇學歷";
                    break;
                case 5:
                    echo "請選擇興趣";
                    break;
            }
            echo "</div>";
        }
        
    ?>
</body>
</html>