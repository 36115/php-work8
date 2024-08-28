<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "students";

    $conn = mysqli_connect($servername, $username, $password, $database) or die("Connection Failed.");

    $sql = "SELECT * FROM students ORDER BY class_id ASC";
    $result = $conn->query($sql);

    $count = mysqli_num_rows($result);
    $order = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>สรวิชญ์-11</title>
    
    <!-- Font Support -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
</head>
<style>
    * {
        font-family: "K2D", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
</style>
<body>

    <div class="container">
        <div class="mt-3">
            <div class="my-5 text-center">
                <h3>รายชื่อนักเรียน</h3>
            </div>
        </div>
    </div>

    <?php if ($count > 0) {?>
    <div class="container pb-4 px-2" id="table-result">
        <table class="table table-bordered table-striped text-center">
            <thead>
                <tr>
                    <th>ลำดับที่</th>
                    <th style="width: 11.92%;">เลขประจำตัวนักเรียน</th>
                    <th>ชื่อ - นามสกุล</th>
                    <th>ระดับชั้น</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) {?>
                <tr>
                    <td><?php echo $order++?></td>
                    <td><?php echo $row["student_id"]?></td>
                    <td><?php echo $row["first_name"]." ".$row["last_name"]?></td>
                    <td><?php echo $row["class_id"]?></td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>
    <?php } else { ?>
            <div class="container">
                <div class="alert alert-danger" role="alert"><b>ไม่มีข้อมูลนักเรียน!</b></div>
            </div>  
    <?php } ?>
</body>
</html>
