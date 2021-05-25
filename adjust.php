<?php
    include('connect.php');
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <title>國立中央大學選課系統</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/NCULogo.png">
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
                <img src="img/logo_big-removebg-preview.png">
            </div>
        </nav><br><br>

        <div class="row">
            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                <button type="button" class="btn btn-outline-secondary" disabled>Step 1 教學評量</button>
                <button type="button" class="btn btn-outline-secondary" disabled>Step 2 導師密碼</button>
                <button type="button" class="btn btn-outline-secondary" disabled>Step 3 選課重要規定</button>
                <button type="button" class="btn btn-dark">Step 4 挑選課程</button>
                <button type="button" class="btn btn-outline-dark">Step 5 志願序及選修別</button>
                <button type="button" class="btn btn-outline-dark">Step 6 課表確認</button>
            </div>
        </div><br><br>

        <form action="select.php" method="post">
            <div class="row">
                <div class="col">
                    <select class="form-select" aria-label="Default select example" id="select" disabled>
                        <option selected>請選擇查詢條件</option>
                        <option value="1">授課教師</option>
                        <!--option value="2">課號</option>
                        <option value="3">課程名稱</option>
                        <option value="1">授課教師</option>
                        <option value="2">選修別</option>
                        <option value="3">學分</option>
                        <option value="1">時間</option>
                        <option value="2">教室</option-->
                    </select>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="請輸入查詢關鍵字" aria-label="請輸入查詢關鍵字" name=teacher disabled>
                </div>
                <div class="col-auto">
                    <button type="submit" name="bt" value="查詢" class="btn btn-primary mb-3" disabled>查詢</button>
                </div>
            </div>
        </form>


        <table class="table table-hover" id="table">
            <thead>
                <tr style="background-color: #91301a; color: white;">
                    <th>課號</th>
                    <th>課程名稱</th>
                    <th>授課教師</th>
                    <th>選修別</th>
                    <th>學分</th>
                    <th>時間</th>
                    <th>教室</th>
                    <th>刪除</th>
                </tr>
            </thead>
            <tbody>
                <form action="insert.php" method="post">
                    <tr>
                        <td><input type="text" class="form-control" placeholder="課號" name="id"></td>
                        <td><input type="text" class="form-control" placeholder="課程名稱" name="name"></td>
                        <td><input type="text" class="form-control" placeholder="授課教師" name="teacher"></td>
                        <td><input type="text" class="form-control" placeholder="選修別" name="type"></td>
                        <td><input type="text" class="form-control" placeholder="學分" name="credit"></td>
                        <td><input type="text" class="form-control" placeholder="時間" name="time"></td>
                        <td><input type="text" class="form-control" placeholder="教室" name="classroom"></td>
                        <td><input type="submit" class="btn btn-primary col-md-12" value="加選"></td>
                    </tr>
                </form>
                <?php
                    if($s = mysqli_query($conn, "SELECT * FROM course ORDER BY no ASC")) {
                        while($r = mysqli_fetch_array($s)) {
                            echo "<form action='delete.php' method=post>";
                            echo "<tr><td>".$r['id']."</td><td>".$r['name']."</td><td>".$r['teacher']."</td><td>".$r['type']."</td><td>".$r['credit']."</td><td>".$r['time']."</td><td>".$r['classroom']."</td>";
                            echo "<td><button class='btn btn-danger' type='submit' name='bt'>退選</button></td></tr>";
                            echo "</form>";
                        }
                    }
                ?>
            </tbody><br><br><br>
        </table>
    </div>
</body>

</html>
