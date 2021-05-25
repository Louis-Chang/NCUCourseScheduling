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
        <?php
            include('connect.php'); //引入"連結資料庫"程式

            $id = mysqli_real_escape_string($conn,$_POST['id']);
            $name = mysqli_real_escape_string($conn,$_POST['name']);
            $teacher = mysqli_real_escape_string($conn,$_POST['teacher']);
            $type = mysqli_real_escape_string($conn,$_POST['type']);
            $credit = mysqli_real_escape_string($conn,$_POST['credit']);
            $time = mysqli_real_escape_string($conn,$_POST['time']);
            $classroom = mysqli_real_escape_string($conn,$_POST['classroom']);

            $s = mysqli_query($conn,"INSERT INTO `course`(`id`, `name`, `teacher`, `type`, `credit`, `time`, `classroom`) VALUES ('$id', '$name', '$teacher', '$type', $credit, '$time', '$classroom')");


            if($s){
                echo "<div class='container'><div class='alert alert-success' role='alert'>新增成功</div></div>";
                echo "<meta http-equiv='refresh' content='2; url=course.php'>";
            } else {
                echo "<div class='container'><div class='alert alert-danger' role='alert'>新增失敗</div></div>";
                echo "<meta http-equiv='refresh' content='2; url=course.php'>";
            }
        ?>
    </div>
</body>
</html>