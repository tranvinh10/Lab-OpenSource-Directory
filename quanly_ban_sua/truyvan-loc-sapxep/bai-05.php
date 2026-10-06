<!-- Liệt kê danh sách sữa 
gồm có: tên sữa, trọng lượng, đơn giá, thành phần dinh dưỡng.
Chỉ liệt kê các sữa có tên bắt đầu là 'S' -->

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
$query = "SELECT Ten_sua, Trong_luong, Don_gia, TP_Dinh_Duong
          FROM sua
          WHERE Ten_sua LIKE 'S%'
          ORDER BY Ten_sua ASC";

// 5. Thực thi truy vấn
$result = $conn->query($query);

if (!$result) {
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

    <h2>Danh sách sữa</h2>

    <table border="5">
        <tr>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
        </tr>

        <?php
        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

</body>

</html>

<?php

// 6. Đóng kết nối
$conn->close();

?>