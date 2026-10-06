<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tính tiền KARAOKE</title>
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

        div p {
            width: 40px;

            padding: 0 0 0 5px;

            font-size: 14px;
        }

        label {
            width: 200px;

            font-size: 16px;
            padding: 0;
        }

        input[type="text"] {
            width: 215px;
            height: 27px;
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
    // 10h - 17h: 20k/h 
    // 17h - 24h: 45k/h
    $start_time = '';
    $end_time = '';
    $total_pay = '';
    if ($_POST) {
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];
        if (!is_numeric($start_time) || !is_numeric($end_time) || $start_time < 10 || $end_time > 24) {
            $total_pay = "Giờ không hợp lệ";
        } elseif ($start_time >= $end_time) {
            $total_pay = "Giờ kết thúc phải > giờ bắt đầu";
        } else {
            if ($end_time < 17) {
                $total_pay = ($end_time - $start_time) * 20000;
            } elseif ($start_time >= 17) {
                $total_pay = ($end_time - $start_time) * 45000;
            } else {
                $total_pay = (17 - $start_time) * 20000 + ($end_time - 17) * 45000;
            }
        }
    }
    ?>
    <form action="pay_karaoke_bill.php" method="post">
        <h1>TÍNH TIỀN KARAOKE</h1>
        <div>
            <label for="start_time">Giờ bắt đầu:</label>
            <input type="text" name="start_time" id="start_time" value="<?php echo isset($start_time) ? $start_time : ''; ?>">
            <p>(h)</p>
        </div>
        <div>
            <label for="end_time">Giờ kết thúc:</label>
            <input type="text" name="end_time" id="end_time" value="<?php echo isset($end_time) ? $end_time : ''; ?>">
            <p>(h)</p>
        </div>
        <div>
            <label for="total_pay">Tiền thanh toán:</label>
            <input type="text" name="total_pay" id="total_pay" readonly value="<?php echo isset($total_pay) ? $total_pay : ''; ?>">
            <p>(VNĐ)</p>
        </div>
        <button type="submit">Tính tiền</button>
    </form>
</body>

</html>