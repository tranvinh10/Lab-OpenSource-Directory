<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phép tính</title>

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: "Times New Roman", serif;
        }

        form {
            width: 500px;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: blue;
            font-size: 20px;
            margin: 25px 0 10px 0;
        }

        /* Label "Chọn phép tính" */
        form>label:first-of-type {
            color: red;
            font-weight: bold;
            padding: 0 5px;
        }

        /* Các label Cộng, Trừ, Nhân, Chia */
        input[type="radio"]+label {
            color: red;
        }

        /* Label Số thứ nhất, Số thứ hai */
        label[for="num1"],
        label[for="num2"] {
            display: inline-block;
            width: 140px;
            text-align: right;

            color: #0000cc;
            font-weight: bold;

            margin-right: 5px;
            margin-top: auto;
        }

        input[type="text"] {
            width: 205px;
            height: 24px;

            box-sizing: border-box;
            font-size: 16px;

            margin-bottom: 5px;
            margin-top: 6px;
        }

        button {
            border: #0000cc 2px solid;

            margin-left: 140px;
            margin-top: 0;

            font-size: 14px;
        }
    </style>
</head>

<body>

    <form action="calculation_result.php" method="post">

        <h1>PHÉP TÍNH TRÊN HAI SỐ</h1>

        <label>Chọn phép tính:</label>

        <input type="radio" name="operation" id="add" value="add" required>
        <label for="add">Cộng</label>

        <input type="radio" name="operation" id="subtract" value="subtract">
        <label for="subtract">Trừ</label>

        <input type="radio" name="operation" id="multiply" value="multiply">
        <label for="multiply">Nhân</label>

        <input type="radio" name="operation" id="divide" value="divide">
        <label for="divide">Chia</label>

        <br>

        <label for="num1">Số thứ nhất:</label>
        <input type="text" name="num1" id="num1">

        <br>

        <label for="num2">Số thứ hai:</label>
        <input type="text" name="num2" id="num2">

        <br>

        <button type="submit">Tính</button>

    </form>

</body>

</html>