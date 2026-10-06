<!-- 8. Liệt kê danh sách sữa 
có đơn giá lớn hơn 100.000 VNĐ,
gồm các thông tin: tên sữa, đơn giá, trọng lượng, 
danh sách được xếp theo thứ tự tên sữa giảm dần.

9. Cho biết các sữa có mã loại sữa là 'SC' 
và có mã hãng sữa là 'VNM' 
gồm các thông tin sau: tên sữa,thành phần dinh dưỡng, lợi ích, 
trong đó tên sữa sắp theo thứ tự tăng dần -->

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
$query1 = "SELECT Ten_sua, Don_gia, Trong_luong
          FROM sua
          WHERE Don_gia > 100000
          ORDER BY Ten_sua DESC";

$query2 = "SELECT Ten_sua, TP_Dinh_Duong, Loi_ich
          FROM sua
          WHERE Ma_loai_sua = 'SC' AND Ma_hang_sua = 'VNM'
          ORDER BY Ten_sua ASC";

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
    <title>Danh sách sữa</title>
</head>

<body>

    <h2>8. Danh sách sữa</h2>

    <table border="5">
        <tr>
            <th>Tên sữa</th>
            <th>Đơn giá</th>
            <th>Trọng lượng</th>
        </tr>

        <?php
        while ($row = $result1->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "</tr>";
        }
        ?>

    </table>

    <h2>9. Danh sách sữa theo loại và hãng</h2>
    <table border="5">
        <tr>
            <th>Tên sữa</th>
            <th>Thành phần dinh dưỡng</th>
            <th>Lợi ích</th>
        </tr>

        <?php
        while ($row = $result2->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
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