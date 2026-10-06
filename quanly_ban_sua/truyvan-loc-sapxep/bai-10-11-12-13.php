<!-- 10. Liệt kê danh sách sữa 
có trọng lượng lớn hơn hay bằng 900 gr 
hoặc mã hãng sữa là 'DS'

11. Liệt kê danh sách các sữa
có đơn giá từ 100.000 VNĐ đến 150.000 VNĐ

12. Liệt kê các sữa 
có mã hãng sữa là 'DM' hay 'DL' hay 'DS' 
và có trọng lượng lớn hơn hay bằng 800 gr,
sắp tăng dần theo trọng lượng.

13. Liệt kê các sữa có mã loại là 'SD' 
hoặc có giá tiền nhỏ hơn hay bằng 12.000 VNĐ -->


<?php

include_once("config.php");

// 1. Mở kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// 2. Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// 3. Thiết lập tiếng Việt
$conn->set_charset("utf8");

echo "<b>Kết nối thành công</b><br>";

// 4. Chuẩn bị truy vấn
$query10 = "SELECT `sua`.*, `sua`.`Trong_luong`, `sua`.`Ma_hang_sua`
FROM `sua`
WHERE `sua`.`Trong_luong` >= '900' OR `sua`.`Ma_hang_sua` LIKE 'DS';";

$query11 = "SELECT `sua`.*, `sua`.`Don_gia`
FROM `sua`
WHERE `sua`.`Don_gia` BETWEEN 100000 AND 150000;";

$query12 = "SELECT `sua`.*, `sua`.`Trong_luong`
FROM `sua`
WHERE (`sua`.`Ma_hang_sua` IN ('DM', 'DL', 'DS')) AND (`sua`.`Trong_luong` >= 800)
ORDER BY `sua`.`Trong_luong` ASC;";

$query13 = "SELECT `sua`.*, `sua`.`Don_gia`
FROM `sua`
WHERE `sua`.`Ma_loai_sua` = 'SD' OR `sua`.`Don_gia` <= 12000;";

// 5. Thực thi truy vấn
$result10 = $conn->query($query10);
$result11 = $conn->query($query11);
$result12 = $conn->query($query12);
$result13 = $conn->query($query13);

if (!$result10 || !$result11 || !$result12 || !$result13) {
    die("Query false: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách sữa</title>
</head>

<body>

    <h2>10. Danh sách sữa</h2>

    <table border="5">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Mã hãng sữa</th>
            <th>Mã loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
            <th>Lợi ích</th>
            <th>Hình</th>
        </tr>

        <?php
        while ($row = $result10->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Ma_hang_sua"] . "</td>";
            echo "<td>" . $row["Ma_loai_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
            echo "<td><img src='" . $row["Hinh"] . "' width='100' height='100'></td>";
            echo "</tr>";
        }
        ?>

    </table>

    <h2>11. Danh sách sữa theo giá tiền 100.000 - 150.000 VNĐ</h2>
    <table border="5">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Mã hãng sữa</th>
            <th>Mã loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
            <th>Lợi ích</th>
            <th>Hình</th>
        </tr>

        <?php
        while ($row = $result11->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Ma_hang_sua"] . "</td>";
            echo "<td>" . $row["Ma_loai_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
            echo "<td><img src='" . $row["Hinh"] . "' width='100' height='100'></td>";
            echo "</tr>";
        }
        ?>
        </tr>

    </table>

    <h2>12. Danh sách sữa theo hãng DM, DL, DS và có trọng >= 800g</h2>
    <table border="5">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Mã hãng sữa</th>
            <th>Mã loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
            <th>Lợi ích</th>
            <th>Hình</th>
        </tr>

        <?php
        while ($row = $result12->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Ma_hang_sua"] . "</td>";
            echo "<td>" . $row["Ma_loai_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
            echo "<td><img src='" . $row["Hinh"] . "' width='100' height='100'></td>";
            echo "</tr>";
        }
        ?>
        </tr>

    </table>

    <h2>13. Danh sách sữa theo loại 'SD' hoặc giá nhỏ hơn 12.000VNĐ</h2>
    <table border="5">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Mã hãng sữa</th>
            <th>Mã loại sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
            <th>Lợi ích</th>
            <th>Hình</th>
        </tr>

        <?php
        while ($row = $result13->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Ma_hang_sua"] . "</td>";
            echo "<td>" . $row["Ma_loai_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
            echo "<td><img src='" . $row["Hinh"] . "' width='100' height='100'></td>";
            echo "</tr>";
        }
        ?>
        </tr>

    </table>
</body>

</html>

<?php

// 6. Đóng kết nối
$conn->close();

?>