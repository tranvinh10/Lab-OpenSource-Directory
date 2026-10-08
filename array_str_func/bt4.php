<?php

// Hàm tìm kiếm
function tim_kiem($soCanTim, $mang)
{
    for ($i = 0; $i < count($mang); $i++) {

        if (trim($mang[$i]) == $soCanTim) {

            return "Tìm thấy " . $soCanTim
                . " tại vị trí thứ " . ($i + 1)
                . " của mảng";
        }
    }

    return "Không tìm thấy " . $soCanTim . " trong mảng";
}


// Khởi tạo biến
$chuoiNhapVao = '';
$soCanTim = '';
$mang = [];
$chuoiMang = '';
$ketqua = '';


if ($_POST) {

    // Kiểm tra có nhập dữ liệu không
    if (
        !isset($_POST['chuoiNhapVao']) ||
        trim($_POST['chuoiNhapVao']) == '' ||
        !isset($_POST['soCanTim']) ||
        trim($_POST['soCanTim']) == ''
    ) {

        $ketqua = "Vui lòng nhập đầy đủ dữ liệu";
    } else {

        // Lấy dữ liệu
        $chuoiNhapVao = $_POST['chuoiNhapVao'];
        $soCanTim = $_POST['soCanTim'];

        // Tách chuỗi thành mảng
        $mang = explode(',', $chuoiNhapVao);

        // Kiểm tra từng phần tử trong mảng
        $hopLe = true;

        foreach ($mang as $value) {

            if (!is_numeric(trim($value))) {
                $hopLe = false;
                break;
            }
        }

        // Kiểm tra dữ liệu
        if (!is_numeric(trim($soCanTim))) {

            $ketqua = "Số cần tìm phải là một số.";
        } elseif (!$hopLe) {

            $ketqua = "Vui lòng nhập lại! Mảng chỉ được chứa các số.";
        } else {

            // Mảng hợp lệ → xuất mảng
            $chuoiMang = implode(', ', $mang);

            // Gọi hàm tìm kiếm
            $ketqua = tim_kiem($soCanTim, $mang);
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm kiếm</title>

    <style>
        form {
            width: 600px;
            margin: 30px auto;
            background-color: #d9f5f2;
        }

        h2 {
            text-align: center;
            color: white;
            background-color: #269b92;
            padding: 8px;
        }

        label {
            display: inline-block;
            width: 180px;
            margin: 5px;
        }

        input[type="text"] {
            width: 350px;
            height: 22px;
        }
        #soCanTim {
            width: 100px;
        }

        input[type="submit"] {
            margin: 5px 0px 5px 195px;
            padding: 5px 20px;
            background-color: blue;
            
        }

        #array {
            background-color: white;
        }

        #result {
            background-color: #d8ffff;
            color: red;
        }

        p {
            text-align: center;
            background-color: #4e8d87;
            padding: 2px;
        }
    </style>
</head>

<body>

    <form action="bt4.php" method="post" name="timkiem">

        <h2>TÌM KIẾM</h2>

        <label for="chuoiNhapVao">
            Nhập mảng:
        </label>

        <input type="text"
            name="chuoiNhapVao"
            id="chuoiNhapVao"
            value="<?php echo $chuoiNhapVao; ?>">

        <br>

        <label for="soCanTim">
            Nhập số cần tìm:
        </label>

        <input type="text"
            name="soCanTim"
            id="soCanTim"
            value="<?php echo $soCanTim; ?>">

        <br>

        <input type="submit" value="Tìm kiếm">

        <br>

        <label for="array">
            Mảng:
        </label>

        <input type="text"
            name="array"
            id="array"
            value="<?php echo $chuoiMang; ?>"
            readonly>

        <br>

        <label for="result">
            Kết quả tìm kiếm:
        </label>

        <input type="text"
            name="result"
            id="result"
            value="<?php echo $ketqua; ?>"
            readonly>

        <p>
            (Các phần tử trong mảng sẽ cách nhau bằng dấu ",")
        </p>

    </form>

</body>

</html>