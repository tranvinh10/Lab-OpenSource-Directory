<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TÍNH DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
        }

        form {
            width: 440px;
            height: 220px;
            background-color: #fff4c7;
        }

        h1 {
            margin: 0 0 10px 0;
            text-align: center;
            color: #631010;
            background-color: #e4bd3c;
            font-size: 36px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .row {
            display: flex;
            align-items: center;
            margin-right: 40px;
            margin-top: 5px;
        }

        label {
            width: 165px;
            font-size: 16px;
            padding: 5px 25px;
        }

        input[type="text"] {
            width: 230px;
            height: 24px;
            font-size: 16px;
            margin: 2px 5px;
        }

        #area,
        #circumference {
            background-color: #f5caca;
        }

        #radius {
            background-color: #f5f5f5;
        }

        button[type="submit"] {
            border-bottom: 3px solid black;
            border-right: 3px solid black;
            border-top: 3px solid #cdc0c0;
            border-left: 3px solid #cdc0c0;
            display: block;
            margin: 5px auto 0;
        }
    </style>
</head>

<body>
    <?php
    define('PI', 3.14);
    $radius = isset($_POST['radius']) ? $_POST['radius'] : '';
    $area = '';
    $circumference = '';
    if ($_POST) {
        if (is_numeric($radius) && $radius > 0) {
            $area = PI * pow($radius, 2);
            $circumference = 2 * PI * $radius;
        } else {
            $area = 'Vui lòng nhập bán kính hợp lệ';
            $circumference = 'Vui lòng nhập bán kính hợp lệ';
        }
    }
    ?>

    <form action="circle.php" name="calculator" method="post">
        <h1>DIỆN TÍCH VÀ CHU VI HÌNH TRÒN</h1>
        <div class="row">
            <label for="radius">Bán kính: </label>
            <input type="text" name="radius" id="radius" value="<?php echo isset($radius) ? $radius : ''; ?>"> <br>
        </div>
        <div class="row">
            <label for="area">Diện tích: </label>
            <input type="text" name="area" id="area" readonly value="<?php echo isset($area) ? $area : ''; ?>"><br>
        </div>
        <div class="row">
            <label for="circumference">Chu vi: </label>
            <input type="text" name="circumference" id="circumference" readonly value="<?php echo isset($circumference) ? $circumference : ''; ?>"><br>
        </div>
        <button type="submit" value="Tính">
            Tính
        </button>
    </form>
</body>

</html>