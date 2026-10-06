<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diện tích hình chữ nhật</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
        }

        form {
            width: 330px;
            height: 160px;
            background-color: #fff4c7;
        }

        h1 {
            margin: 0 0 10px 0;
            text-align: center;
            color: #631010;
            background-color: #e4bd3c;
            font-size: 22px;
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
            padding: 5px 10px;
        }

        input[type="text"] {
            width: 150px;
            height: 24px;
            font-size: 16px;
            margin: 2px 5px;
        }

        #area {
            background-color: #f5caca;
        }

        #length,
        #width {
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
    $length = $width = $area = 0;
    if ($_POST) {
        $length = $_POST['length'];
        $width = $_POST['width'];
        if (!is_numeric($length) || !is_numeric($width)) {
            echo "<p style='color: red; text-align: center;'>Vui lòng nhập số hợp lệ cho chiều dài và chiều rộng.</p>";
        } else {
            $area = $length * $width;
        }
    }
    ?>

    <form name="area_form" action="rectangle.php" method="post">
        <h1>DIỆN TÍCH HÌNH CHỮ NHẬT</h1>

        <div class="row">
            <label for="length">Chiều dài: </label>
            <input type="text" name="length" id="length" value="<?php echo isset($length) ? $length : ''; ?>"> <br>
        </div>

        <div class="row">
            <label for="width">Chiều rộng: </label>
            <input type="text" name="width" id="width" value="<?php echo isset($width) ? $width : ''; ?>"> <br>
        </div>
        <div class="row">
            <label for="area">Diện tích: </label>
            <input type="text" name="area" id="area" readonly value="<?php echo isset($area) ? $area : ''; ?>"><br>
        </div>

        <button type="submit" value="Tính">
            Tính
        </button>
    </form>
</body>

</html>