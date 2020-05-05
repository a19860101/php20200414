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
                <form action="store_student.php" method="post">
                    <div class="form-group">
                        <label for="name">姓名</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="phone">電話</label>
                        <input type="text" id="phone" name="phone" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="mail">Mail</label>
                        <input type="text" id="mail" name="mail" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edu">學歷</label>
                        <select name="edu" id="edu" class="form-control">
                            <option value="">請選擇</option>
                            <option value="國小">國小</option>
                            <option value="國中">國中</option>
                            <option value="高中職">高中職</option>
                            <option value="大專院校">大專院校</option>
                            <option value="研究所以上">研究所以上</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div>性別</div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="male" value="男">
                            <label for="male" class="form-check-label">男性</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" class="form-check-input" name="gender" id="female" value="女">
                            <label for="female" class="form-check-label">女性</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>專長</div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" name="skills[]" id="graphic" value="平面設計">
                            <label for="graphic" class="form-check-label">平面設計</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" name="skills[]" id="web" value="網頁設計">
                            <label for="web" class="form-check-label">網頁設計</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" name="skills[]" id="threeD" value="3D設計">
                            <label for="threeD" class="form-check-label">3D設計</label>
                        </div>
                        
                    </div>
                    <input type="submit" class="btn btn-primary" value="新增" onclick="alert('test')">
                    <!-- <input type="button" class="btn btn-danger" value="取消" onclick="history.back()"> -->
                    <input type="button" class="btn btn-danger" value="取消" onclick="location.href='index.php'">
                </form>
            </div>
        </div>
    </div>
</body>
</html>