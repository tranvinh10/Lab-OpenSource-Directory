<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng dãy số</title>

    <style>
        form {
            width: 500px;
            margin: 30px auto;
            background-color: #ccd9b4;
        }

        h1 {
            text-align: center;
            color: white;
            background-color: green;
            font-size: 24px;
            padding: 8px;
        }

        label {
            display: inline-block;
            padding-left: 10px;
            width: 120px;
        }

        input[type="text"] {
             border-top: 2px solid #555;
            border-left: 2px solid #555;
            width: 240px;
            height: 22px;
        }

        input[type="submit"] {
            padding: 3px 15px;
            margin-left: 135px;
            background-color: #d6db70;
            border-bottom: 3px solid #555;
            border-right: 3px solid #555;
            border-top: 2px solid #ddd;
            border-left: 2px solid #ddd;
        }

        #total {
            background-color: #d5f5a3;
        }
    </style>
</head>

<body>

<?php

$dayso = '';
$tong = '';

if ($_POST) {

    // Kiểm tra có nhập dãy số hay không
    if (!isset($_POST['dayso']) || trim($_POST['dayso']) == '') {

        $tong = "Vui lòng nhập dãy số";

    } else {

        // Lấy dãy số từ form
        $dayso = $_POST['dayso'];

        // Tách chuỗi thành mảng
        $mang = explode(',', $dayso);

        // Đếm số phần tử
        $n = count($mang);

        // Tính tổng
        $tong = 0;

        for ($i = 0; $i < $n; $i++) {

            // Kiểm tra phần tử có phải số không
            if (!is_numeric(trim($mang[$i]))) {

                $tong = "Dãy số không hợp lệ";
                break;
            }

            $tong += (float) trim($mang[$i]);
        }
    }
}

?>

<form action="bt2.php" method="post">

    <h1>NHẬP VÀ TÍNH TRÊN DÃY SỐ</h1>

    <label for="dayso">Nhập dãy số:</label>

    <input type="text"
           name="dayso"
           id="dayso"
           value="<?php echo $dayso; ?>">

    <span style="color: red;">(*)</span>

    <br><br>

    <input type="submit" value="Tổng dãy số">

    <br><br>

    <label for="total">Tổng dãy số:</label>

    <input type="text"
           name="total"
           id="total"
           value="<?php echo $tong; ?>"
           readonly>

    <p style="color: red; text-align: center;">
    (*) Các số được nhập cách nhau bằng dấu phẩy (,)
    </p>

</form>

</body>

</html>