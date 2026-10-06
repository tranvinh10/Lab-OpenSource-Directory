<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả phép tính</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", serif;
        }

        form {
            width: 500px;
            margin: auto;
        }

        h1 {
            text-align: center;
            color: blue;
            font-size: 20px;
            margin: 25px 0 10px 0;
        }

        div {
            display: flex;
            align-items: center;

        }

        /* Phần label */
        div label {
            width: 140px;
            text-align: right;
            margin-right: 5px;

            color: #0000cc;
            font-size: 16px;
            font-weight: bold;
        }

        /* Riêng "Chọn phép tính" */
        div:first-of-type label {
            color: red;
        }

        input[type="number"],
        input[type="text"] {
            width: 250px;
            height: 24px;

            padding: 4px 5px;
            box-sizing: border-box;

            font-size: 16px;
        }

        div:first-of-type span {
            color: orange;
            font-weight: bold;
        }

        /* Link quay lại */
        a {
            display: block;
            width: 250px;

            margin-left: 140px;

            color: purple;
            font-style: italic;
            text-decoration: underline;
        }
    </style>
</head>


<?php

// Hàm kiểm tra dữ liệu
function checkData($num1, $num2, $operation)
{
    // Kiểm tra phép tính
    if ($operation == '') {
        return false;
    }

    // Kiểm tra số thứ nhất
    if (!is_numeric($num1)) {
        return false;
    }

    // Kiểm tra số thứ hai
    if (!is_numeric($num2)) {
        return false;
    }

    // Kiểm tra chia cho 0
    if ($operation == 'divide' && floatval($num2) == 0) {
        return false;
    }

    return true;
}


// Các hàm tính toán
function add($a, $b)
{
    return $a + $b;
}

function subtract($a, $b)
{
    return $a - $b;
}

function multiply($a, $b)
{
    return $a * $b;
}

function divide($a, $b)
{
    return $a / $b;
}


// Nhận dữ liệu
$num1 = '';
$num2 =  '';
$operation = '';
if($_POST) {
    $num1 = $_POST['num1'];
    $num2 = $_POST['num2'];
    $operation = $_POST['operation'];
}


// Kiểm tra dữ liệu
if (!checkData($num1, $num2, $operation)) {

    // Dữ liệu không hợp lệ
    header("Location: calculation.php");
    exit();
}


// Chuyển sang số thực
$num1 = floatval($num1);
$num2 = floatval($num2);


// Tính toán
switch ($operation) {

    case 'add':
        $result = add($num1, $num2);
        $operationName = "Cộng";
        break;

    case 'subtract':
        $result = subtract($num1, $num2);
        $operationName = "Trừ";
        break;

    case 'multiply':
        $result = multiply($num1, $num2);
        $operationName = "Nhân";
        break;

    case 'divide':
        $result = divide($num1, $num2);
        $operationName = "Chia";
        break;

    default:
        header("Location: calculator.php");
        exit();
}

?>

<body>

    <form>

        <h1>PHÉP TÍNH TRÊN HAI SỐ</h1>

        <div>
            <label>Chọn phép tính:</label>

            <span style="color: red;">
                <?php echo $operationName; ?>
            </span>
        </div>

        <div>
            <label for="num1">Số 1:</label>

            <input type="text"
                id="num1"
                value="<?php echo $num1; ?>"
                readonly>
        </div>

        <div>
            <label for="num2">Số 2:</label>

            <input type="text"
                id="num2"
                value="<?php echo $num2; ?>"
                readonly>
        </div>

        <div>
            <label for="result">Kết quả:</label>

            <input type="text"
                id="result"
                value="<?php echo $result; ?>"
                readonly>
        </div>

        <a href="javascript:window.history.back(-1);" style="font-style: italic;">
            Quay lại trang trước
        </a>

    </form>

</body>



</html>