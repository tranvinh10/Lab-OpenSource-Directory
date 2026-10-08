<?php

// Hàm hoán vị 2 số
function hoan_vi(&$a, &$b)
{
    $temp = $a;
    $a = $b;
    $b = $temp;
}


// Hàm sắp xếp tăng dần
function sap_tang($mang)
{
    for ($i = 0; $i < count($mang) - 1; $i++) {

        for ($j = $i + 1; $j < count($mang); $j++) {

            if ($mang[$i] > $mang[$j]) {
                hoan_vi($mang[$i], $mang[$j]);
            }
        }
    }

    return $mang;
}


// Hàm sắp xếp giảm dần
function sap_giam($mang)
{
    for ($i = 0; $i < count($mang) - 1; $i++) {

        for ($j = $i + 1; $j < count($mang); $j++) {

            if ($mang[$i] < $mang[$j]) {
                hoan_vi($mang[$i], $mang[$j]);
            }
        }
    }

    return $mang;
}


// Hàm xuất mảng
function xuat_mang($mang)
{
    return implode(" ", $mang);
}


$chuoi = '';
$mangTang = [];
$mangGiam = [];

if ($_POST) {

    $chuoi = $_POST['chuoi'];

    // Tách chuỗi thành mảng
    $mang = explode(',', $chuoi);

    // Kiểm tra các phần tử có phải số không
    $hopLe = true;

    for ($i = 0; $i < count($mang); $i++) {

        $mang[$i] = trim($mang[$i]);

        if (!is_numeric($mang[$i])) {
            $hopLe = false;
            break;
        }
    }

    if ($hopLe) {

        // Sắp xếp tăng
        $mangTang = sap_tang($mang);

        // Sắp xếp giảm
        $mangGiam = sap_giam($mang);
    } else {

        $mangTang = ["Kiểm tra lại các giá trị đã nhập!"];
        $mangGiam = ["Kiểm tra lại các giá trị đã nhập!"];
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sắp xếp mảng</title>

    <style>
        form {
            width: 600px;
            margin: 20px auto;
            background-color: #dff5ee;
        }

        h1 {
            text-align: center;
            color: white;
            background-color: #269b91;
            font-size: 25px;
            padding: 8px;
        }

        div {
            margin-bottom: 10px;
        }

        label {
            display: inline-block;
            width: 150px;
        }

        input[type="text"] {
            width: 300px;
            height: 22px;
        }

        input[type="submit"] {
            margin-left: 155px;
        }

        .result {
            background-color: #d5f5f5;
        }
    </style>
</head>

<body>

    <form action="bt6.php" method="post">

        <h1>SẮP XẾP MẢNG</h1>

        <div>
            <label for="chuoi">Nhập mảng:</label>

            <input type="text"
                name="chuoi"
                id="chuoi"
                value="<?php echo $chuoi; ?>">

            <span style="color: red;">(*)</span>
        </div>

        <div>
            <input type="submit" value="Sắp xếp tăng/giảm">
        </div>

        <p style="color: red;">
            Sau khi sắp xếp:
        </p>

        <div>
            <label>Tăng dần:</label>

            <input type="text"
                class="result"
                value="<?php echo xuat_mang($mangTang); ?>"
                readonly>
        </div>

        <div>
            <label>Giảm dần:</label>

            <input type="text"
                class="result"
                value="<?php echo xuat_mang($mangGiam); ?>"
                readonly>
        </div>

        <p style="text-align: center;">
            (<strong>Ghi chú:</strong> Các số được nhập cách nhau bằng dấu ",")
        </p>

    </form>

</body>

</html>