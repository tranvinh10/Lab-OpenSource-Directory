<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập mảng</title>

    <!-- <style>
        form {
            width: 600px;
            margin: 30px auto;
        }

        h1 {
            text-align: center;
        }

        input[type="text"] {
            width: 200px;
        }

        .result {
            margin-top: 20px;
        }
    </style> -->
</head>

<body>

<?php

$n = '';
$array = [];
$even = 0;
$less100 = 0;
$sumNegative = 0;
$zeroPositions = [];
$error = '';

if ($_POST) {

    $n = $_POST['n'];

    // a. Kiểm tra n có phải số nguyên dương
    if (!is_numeric($n) || intval($n) != $n || $n <= 0) {

        $error = "n phải là số nguyên dương.";

    } else {

        $n = intval($n);

        // b. Phát sinh mảng ngẫu nhiên có n phần tử
        for ($i = 0; $i < $n; $i++) {

            $array[$i] = rand(-200, 200);

        }

        // c, d, e, f
        for ($i = 0; $i < $n; $i++) {

            // c. Đếm số phần tử chẵn
            if ($array[$i] % 2 == 0) {
                $even++;
            }

            // d. Đếm số phần tử nhỏ hơn 100
            if ($array[$i] < 100) {
                $less100++;
            }

            // e. Tính tổng các phần tử âm
            if ($array[$i] < 0) {
                $sumNegative += $array[$i];
            }

            // f. Lưu vị trí các phần tử bằng 0
            if ($array[$i] == 0) {
                $zeroPositions[] = $i;
            }
        }

        // g. Sắp xếp tăng dần
        sort($array);
    }
}
?>

<form action="" method="post">

    <h1>Xử lý số tự nhiên</h1>

    <label for="n">Nhập n:</label>

    <input type="text"
           name="n"
           id="n"
           value="<?php echo $n; ?>">

    <input type="submit"
           value="Thực hiện">

    <?php if ($error != '') { ?>

        <p style="color: red;">
            <?php echo $error; ?>
        </p>

    <?php } ?>

    <?php if (count($array) > 0) { ?>

        <div class="result">

            <!-- b -->
            <p>
                <b>Mảng phát sinh:</b>

                <?php
                echo implode(" ", $array);
                ?>
            </p>

            <!-- c -->
            <p>
                <b>Số phần tử chẵn:</b>
                <?php echo $even; ?>
            </p>

            <!-- d -->
            <p>
                <b>Số phần tử nhỏ hơn 100:</b>
                <?php echo $less100; ?>
            </p>

            <!-- e -->
            <p>
                <b>Tổng các phần tử âm:</b>
                <?php echo $sumNegative; ?>
            </p>

            <!-- f -->
            <p>
                <b>Vị trí các phần tử bằng 0:</b>

                <?php

                if (count($zeroPositions) > 0) {

                    echo implode(", ", $zeroPositions);

                } else {

                    echo "Không có phần tử bằng 0.";

                }

                ?>
            </p>

            <!-- g -->
            <p>
                <b>Mảng sau khi sắp xếp tăng dần:</b>

                <?php
                echo implode(" ", $array);
                ?>
            </p>

        </div>

    <?php } ?>

</form>

</body>
</html>