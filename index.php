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
                    <select class="form-select" aria-label="Default select example" id="select">
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
                    <input type="text" class="form-control" placeholder="請輸入查詢關鍵字" aria-label="請輸入查詢關鍵字" name=teacher>
                </div>
                <div class="col-auto">
                    <button type="submit" name="bt" value="查詢" class="btn btn-primary mb-3">查詢</button>
                </div>
            </div>
        </form><br><br>

        <button type="button" class="btn btn-warning col-md-12" onclick="location.href='adjust.php'">調整課程</button><br><br>

        <table class="table table-hover" id="table">
            <thead>
                <tr style="background-color: #91301a; color: white;">
                    <th>流水號</th>
                    <th>課號</th>
                    <th>課程名稱</th>
                    <th>授課教師</th>
                    <th>選修別</th>
                    <th>學分</th>
                    <th>時間</th>
                    <th>教室</th>
<!--                    <th>動作</th>-->
                </tr>
            </thead>
            <tbody>
                <?php
                    if($s = mysqli_query($conn, "SELECT * FROM course ORDER BY no ASC")) {
                        while($r = mysqli_fetch_array($s)) {
                            echo "<form action = select.php method=post>";
                            echo "<tr><td>".$r['no']."</td><td>".$r['id']."</td><td>".$r['name']."</td><td>".$r['teacher']."</td><td>".$r['type']."</td><td>".$r['credit']."</td><td>".$r['time']."</td><td>".$r['classroom']."</td></tr></form>";
//                            echo "<td><input type=hidden name=no value=".$r['no']."><button class='btn btn-secondary' type=submit name=bt>加選</button>  ";
//                            echo "<button class='btn btn-secondary' type=submit name=bt>退選</button></td></tr>";
//                            echo "</form>";
                        }
                    }
                ?>
            </tbody>
        </table><br><br>
    </div>
</body>

</html>
