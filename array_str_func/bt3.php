<?php

//Hàm tạo mảng
function taoMang($n)
{
    $array = [];
    for ($i = 0; $i < $n; $i++) {
        $array[$i] = rand(0, 20);
    }
    return $array;
}
//Hàm xuất mảng
function xuatMang($array)
{
    return implode(" ", $array);
}
//Hàm tổng
function tong($array)
{
    $total = 0;
    foreach ($array as $value) {
        $total += $value;
    }
    return $total;
}
//Hàm min
function timMin($array)
{
    $min = $array[0];
    foreach ($array as $value) {
        if ($value < $min) {
            $min = $value;
        }
    }
    return $min;
}
//Hàm max
function timMax($array)
{
    $max = $array[0];
    foreach ($array as $value) {
        if ($value > $max) {
            $max = $value;
        }
    }
    return $max;
}

$n = '';
$array = '';
$arrayString = '';
$max = '';
$min = '';
$total = '';

if ($_POST) {
    $n = $_POST['n'];
    //Kiểm tra kết nối
    if (!isset($_POST['n']) || trim($_POST['n']) == '') {
        $arrayString = "Vui lòng nhập số phần tử";
    } elseif (!filter_var($_POST['n'], FILTER_VALIDATE_INT) || $_POST['n'] <= 0) {
        $arrayString = "Số phần tử phải là số nguyên dương";
    } else {

        //Goi ham tao mang
        $array = taoMang($n);
        //gọi hàm xuất mảng
        $arrayString = xuatMang($array);
        //gọi hàm max
        $max = timMax($array);
        //gọi hàm min
        $min = timMin($array);
        //gọi hàm tính tổng
        $total = tong($array);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phát sinh mảng</title>
    <style>
        /* Khung form */
        form {
            width: 600px;
            margin: 30px auto;
            border: solid 2px black;
        }

        /* Tiêu đề */
        h2 {
            text-align: center;
            color: white;
            background-color: #b00075;
            padding: 8px;
            margin-bottom: 0px;
            margin-top: 0px;
        }

        /* Label */
        label {
            display: inline-block;
            width: 200px;
            margin-left: 10px;
        }

        /* Ô nhập */
        input[type="text"] {
            width: 250px;
            height: 22px;
            margin-bottom: 10px;
        }
        #array {
            width: 350px;
        }

        /* Nút */
        button[type="submit"] {
            margin-left: 215px;
            padding: 2px 30px;
            margin-bottom: 10px;
            background-color: #ffffb1;
        }

        p {
            text-align: center;
            margin: 0px 0px 2px 0px;
        }
        strong {
            color: red;
        }
        div {
            background-color: #e5a5d2;
            margin: 2px 0px ;
        }

        /* Ô kết quả */
        #array,
        #max,
        #min,
        #total {
            background-color: #ffaaaa;
        }
    </style>
</head>

<body>
    <form action="bt3.php" method="post" name="psm">

        <h2>PHÁT SINH MẢNG VÀ TÍNH TOÁN</h2>

        <div>
            <label for="n">Nhập số phần tử</label>
            <input type="text" name="n" id="n" value="<?php echo $n; ?>"> <br>
        </div>

        <div>
            <button type="submit">Phát sinh và tính toán</button> <br>
        </div>

        <label for="array">Mảng</label>
        <input type="text" name="array" id="array" value="<?php echo $arrayString; ?>"> <br>

        <label for="max">GTLN (MAX) trong mảng</label>
        <input type="text" name="max" id="max" value="<?php echo $max; ?>" readonly> <br>

        <label for="min">GTNN (MIN) trong mảng</label>
        <input type="text" name="min" id="min" value="<?php echo $min; ?>" readonly> <br>

        <label for="total">Tổng mảng</label>
        <input type="text" name="total" id="total" value="<?php echo $total; ?>" readonly> <br>

        <p>(<strong>Ghi chú:</strong> Các phần tử trong mảng sẽ có giá trị từ 0 đến 20)</p>

    </form>
</body>

</html>