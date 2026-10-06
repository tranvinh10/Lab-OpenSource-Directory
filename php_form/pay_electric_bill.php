<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán tiền điện</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 20px;
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            width: 500px;
            height: 270px;
            background-color: #fff4c7;
            padding: 0;
        }

        h1 {
            height: 40px;
            line-height: 40px;

            margin: 0 0 5px 0;

            text-align: center;
            color: #631010;
            background-color: #e4bd3c;

            font-size: 27px;
            font-family: "Times New Roman", serif;
            font-style: italic;
        }

        div {
            height: 36px;

            margin: 0 20px;

            display: flex;
            align-items: center;
        }

        label {
            width: 200px;

            font-size: 16px;
            padding: 0;
        }

        input[type="text"] {
            width: 215px;
            height: 27px;

            font-size: 16px;
            padding: 2px 4px;
        }

        #name,
        #old_index,
        #new_index,
        #price {
            background-color: #f5f5f5;
        }

        #total {
            background-color: #f5caca;
        }

        div p {
            width: 40px;

            padding: 0 0 0 5px;

            font-size: 14px;
        }

        button[type="submit"] {
            display: block;

            margin: 3px auto 0;

            padding: 3px 8px;

            font-size: 16px;

            border-bottom: 3px solid #555;
            border-right: 3px solid #555;
            border-top: 3px solid #ddd;
            border-left: 3px solid #ddd;
        }
    </style>
</head>

<body>
    <?php
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $old_index = isset($_POST['old_index']) ? $_POST['old_index'] : '';
    $new_index = isset($_POST['new_index']) ? $_POST['new_index'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : 20000;
    $total = '';

    if ($_POST) {
        if (!is_numeric($old_index)) {
            echo "<p style='color: red;'>Chỉ số cũ phải là một số.</p>";
        } elseif (!is_numeric($new_index)) {
            echo "<p style='color: red;'>Chỉ số mới phải là một số.</p>";
        } elseif (!is_numeric($price)) {
            echo "<p style='color: red;'>Đơn giá phải là một số.</p>";
        } elseif ($new_index < $old_index) {
            echo "<p style='color: red;'>Chỉ số mới không được nhỏ hơn chỉ số cũ.</p>";
        } else {
            $consumption = $new_index - $old_index;
            $total = $consumption * $price;
        }
    }
    ?>
    <form action="pay_electric_bill.php" name="form_pay" method="post">
        <h1>THANH TOÁN TIỀN ĐIỆN</h1>
        <div>
            <label for="name">Tên chủ hộ: </label>
            <input type="text" name="name" id="name" value="<?php echo isset($name) ? $name : ''; ?>">
        </div>
        <div>
            <label for="old_index">Chỉ số cũ: </label>
            <input type="text" name="old_index" id="old_index" value="<?php echo isset($old_index) ? $old_index : ''; ?>">
            <p> (Kw) </p>
        </div>
        <div>
            <label for="new_index">Chỉ số mới: </label>
            <input type="text" name="new_index" id="new_index" value="<?php echo isset($new_index) ? $new_index : ''; ?>">
            <p> (Kw) </p>
        </div>
        <div>
            <label for="price">Đơn giá: </label>
            <input type="text" name="price" id="price" value="<?php echo isset($price) ? $price : 20000; ?>">
            <p> (VNĐ) </p>
        </div>
        <div>
            <label for="total">Số tiền thanh toán: </label>
            <input type="text" name="total" id="total" readonly value="<?php echo isset($total) ? $total : ''; ?>">
            <p> (VNĐ) </p>
        </div>
        <button type="submit" value="Tính">
            Tính
        </button>
    </form>
</body>

</html>