<?php

function thay_the($mang, $soCu, $soMoi)
{
    for ($i = 0; $i < count($mang); $i++) {
        if ($mang[$i] == $soCu) {
            $mang[$i] = $soMoi;
        }
    }

    return $mang;
}

function xuat_mang($mang)
{
    return implode(" ", $mang);
}


$chuoi = '';
$soCu = '';
$soMoi = '';

$mangCu = [];
$mangMoi = [];

if ($_POST) {

    $chuoi = $_POST['chuoi'];
    $soCu = $_POST['soCu'];
    $soMoi = $_POST['soMoi'];

    // Kiểm tra giá trị cần thay thế và giá trị thay thế
    if (!is_numeric($soCu) || !is_numeric($soMoi)) {

        $mangMoi = ["Kiểm tra lại các giá trị đã nhập!"];

    } else {

        // Tách chuỗi thành mảng
        $mangCu = explode(',', $chuoi);

        // Kiểm tra từng phần tử trong mảng
        $hopLe = true;

        for ($i = 0; $i < count($mangCu); $i++) {

            // Xóa khoảng trắng
            $mangCu[$i] = trim($mangCu[$i]);

            if (!is_numeric($mangCu[$i])) {
                $hopLe = false;
                break;
            }
        }

        if ($hopLe) {

            // Thay thế
            $mangMoi = thay_the($mangCu, $soCu, $soMoi);

        } else {

            $mangMoi = ["Kiểm tra lại các giá trị đã nhập!"];
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thay thế</title>

    <style>
        form {
            width: 600px;
            margin: 20px auto;
            background-color: #ffdff0;
        }

        h1 {
            text-align: center;
            color: white;
            background-color: #b00070;
            font-size: 25px;
            padding: 8px;
        }

        div {
            margin: 8px;
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
            background-color: #ff9999;
        }
    </style>
</head>

<body>

<form action="bt5.php" method="post">

    <h1>THAY THẾ</h1>

    <div>
        <label for="chuoi">Nhập các phần tử:</label>

        <input type="text"
               name="chuoi"
               id="chuoi"
               value="<?php echo $chuoi; ?>">
    </div>

    <div>
        <label for="soCu">Giá trị cần thay thế:</label>

        <input type="text"
               name="soCu"
               id="soCu"
               value="<?php echo $soCu; ?>">
    </div>

    <div>
        <label for="soMoi">Giá trị thay thế:</label>

        <input type="text"
               name="soMoi"
               id="soMoi"
               value="<?php echo $soMoi; ?>">
    </div>

    <div>
        <input type="submit" value="Thay thế">
    </div>

    <div>
    <label>Mảng cũ:</label>

    <input type="text"
           value="<?php echo xuat_mang($mangCu); ?>"
           readonly>
</div>

<div>
    <label>Mảng sau khi thay thế:</label>

    <input type="text"
           value="<?php echo xuat_mang($mangMoi); ?>"
           readonly>
</div>

    <p style="text-align: center;">
        (<strong>Ghi chú:</strong> Các phần tử trong mảng cách nhau bằng dấu ",")
    </p>

</form>

</body>
</html>