<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thi đại học</title>

    <style>
        form {
            width: 480px;
            background-color: #fce1f5;
        }

        h1 {
            margin: 0;
            text-align: center;
            color: white;
            background-color: #e83d7d;
            font-size: 23px;
            font-style: italic;
        }

        div {
            display: flex;
            align-items: center;
            margin: 5px 15px;
        }

        label {
            width: 170px;
        }

        input[type="text"] {
            width: 220px;
            height: 25px;
            font-size: 16px;
        }

        #grade_uni {
            color: red;
        }

        #total_grade,
        #result {
            background-color: #ffffd5;
        }

        button[type="submit"] {
            display: block;
            margin: 5px auto;
            border-bottom: 3px solid #555;
            border-right: 3px solid #555;
            border-top: 3px solid #ddd;
            border-left: 3px solid #ddd;
        }

        #math,
        #physics,
        #chemistry,
        #grade_uni {
            background-color: #f5f5f5;
        }
    </style>
</head>

<body>

    <?php
    $math = '';
    $physics = '';
    $chemistry = '';
    $grade_uni = 20;
    $total_grade = '';
    $result = '';

    if ($_POST) {

        $math = $_POST['math'];
        $physics = $_POST['physics'];
        $chemistry = $_POST['chemistry'];
        $grade_uni = $_POST['grade_uni'];

        if(!is_numeric($math) || $math < 0 || $math > 10) {
            $math = "Điểm Toán không hợp lệ";
        } elseif(!is_numeric($physics) || $physics < 0 || $physics > 10) {
            $physics = "Điểm Lý không hợp lệ";
        } elseif(!is_numeric($chemistry) || $chemistry < 0 || $chemistry > 10) {
            $chemistry = "Điểm Hóa không hợp lệ";
        } elseif(!is_numeric($grade_uni) || $grade_uni < 0) {
            $grade_uni = "Điểm chuẩn không hợp lệ";
        } else {
            $total_grade = $math + $physics + $chemistry;
            if ($total_grade >= $grade_uni && $math > 0 && $physics > 0 && $chemistry > 0) {
                $result = "Đậu";
            } else {
                $result = "Rớt";
            }
        }
    }
    ?>

    <form action="result_exam.php" name="ketqua_daihoc" method="post">

        <h1>KẾT QUẢ THI ĐẠI HỌC</h1>

        <div>
            <label for="math">Toán:</label>
            <input type="text" name="math" id="math" value="<?php echo isset($math) ? $math : ''; ?>">
        </div>

        <div>
            <label for="physics">Lý:</label>

            <input type="text" name="physics" id="physics" value="<?php echo isset($physics) ? $physics : ''; ?>">
        </div>

        <div>
            <label for="chemistry">Hóa:</label>

            <input type="text" name="chemistry" id="chemistry" value="<?php echo isset($chemistry) ? $chemistry : ''; ?>">
        </div>

        <div>
            <label for="grade_uni">Điểm chuẩn:</label>

            <input type="text" name="grade_uni" id="grade_uni" value="<?php echo isset($grade_uni) ? $grade_uni : ''; ?>">
        </div>

        <div>
            <label for="total_grade">Tổng điểm:</label>

            <input type="text" name="total_grade" id="total_grade" readonly value="<?php echo isset($total_grade) ? $total_grade : ''; ?>">
        </div>

        <div>
            <label for="result">Kết quả thi:</label>

            <input type="text" name="result" id="result" readonly value="<?php echo isset($result) ? $result : ''; ?>">
        </div>

        <button type="submit">Xem kết quả</button>

    </form>

</body>

</html>