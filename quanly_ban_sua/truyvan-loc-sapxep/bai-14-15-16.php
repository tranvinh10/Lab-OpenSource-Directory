<!-- 
14. Liệt kê những khách hàng nam, và có họ tên bắt đầu là 'N'

15. Liệt kê tên các hãng sữa mà mã hãng sữa không có ký tự 'M'

16. Liệt kê các sữa có thành phần dinh dưỡng chứa 'canxi' và 'vitamin',
gồm các thông tin: tên sữa, thành phần dinh dưỡng. -->


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
$query14 = "SELECT *
          FROM khach_hang
          WHERE Phai = 0 AND Ten_khach_hang LIKE 'N%'
          ORDER BY Ten_khach_hang ASC;";

$query15 = "SELECT Ten_hang_sua
          FROM hang_sua
          WHERE Ma_hang_sua NOT LIKE '%M%'
          ORDER BY Ten_hang_sua ASC;";
$query16 = "SELECT Ten_sua, TP_Dinh_Duong
          FROM sua
          WHERE TP_Dinh_Duong LIKE '%canxi%' AND TP_Dinh_Duong LIKE '%vitamin%'
          ORDER BY Ten_sua ASC; ";

// 5. Thực thi truy vấn
$result14 = $conn->query($query14);
$result15 = $conn->query($query15);
$result16 = $conn->query($query16);

if (!$result14 || !$result15 || !$result16) {
    die("Query false: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Danh sách truy vấn</title>
</head>

<body>

    <h2>14. Khách hàng nam có họ tên bắt đầu là 'N'</h2>

    <table border="5">
        <tr>
            <th>Mã khách hàng</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Email</th>
        </tr>

        <?php
        while ($row = $result14->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_khach_hang"] . "</td>";
            echo "<td>" . $row["Ten_khach_hang"] . "</td>";
            echo "<td>" . $row["Dia_chi"] . "</td>";
            echo "<td>" . $row["Dien_thoai"] . "</td>";
            echo "<td>" . $row["Email"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>15. Hãng sữa không có ký tự 'M'</h2>

    <table border="5">
        <tr>
            <th>Tên hãng sữa</th>
        </tr>

        <?php
        while ($row = $result15->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_hang_sua"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>16. Sữa có thành phần chứa 'canxi' và 'vitamin'</h2>

    <table border="5">
        <tr>
            <th>Tên sữa</th>
            <th>Thành phần dinh dưỡng</th>
        </tr>

        <?php
        while ($row = $result16->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
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