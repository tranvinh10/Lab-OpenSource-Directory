<!-- 6. Liệt kê danh sách các hãng sữa 
có ký tự cuối cùng của mã hãng sữa là 'M', 
gồm có các thông tin sau: mã hãng sữa, tên hãng sữa, địa chỉ, điện thoại.

7. Liệt kê danh sách sữa mà trong tên sữa có từ 'grow'. -->

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
$query1 = "SELECT Ma_hang_sua, Ten_hang_sua, Dia_chi, Dien_thoai
          FROM hang_sua
          WHERE Ma_hang_sua LIKE '%M'
          ORDER BY Ma_hang_sua ASC";

$query2 = "SELECT `sua`.`Ten_sua`, `sua`.*
FROM `sua`
WHERE `sua`.`Ten_sua` LIKE '%grow%';";

// 5. Thực thi truy vấn
$result1 = $conn->query($query1);
$result2 = $conn->query($query2);

if (!$result1 || !$result2) {
    die("Query false: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách</title>
</head>

<body>

    <h2>6.Danh sách hãng sữa</h2>

    <table border="5">
        <tr>
            <th>Mã hãng sữa</th>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
        </tr>

        <?php
        while ($row = $result1->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_hang_sua"] . "</td>";
            echo "<td>" . $row["Ten_hang_sua"] . "</td>";
            echo "<td>" . $row["Dia_chi"] . "</td>";
            echo "<td>" . $row["Dien_thoai"] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <h2>7. Danh sách sữa</h2>
    <table border="5">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
            <th>Lợi ích</th>
            <th>Mã hãng sữa</th>
        </tr>

        <?php
        while ($row = $result2->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
            echo "<td>" . $row["Ma_hang_sua"] . "</td>";
            echo "</tr>";
        }
        ?>
</body>

</html>

<?php

// 6. Đóng kết nối
$conn->close();

?>