<!-- 
17. Liệt kê các sản phẩm sữa có trọng lượng là 180gr, 200gr hoặc 900 gr

18. Liệt kê các sản phẩm sữa có trọng lượng không là 400gr, 800gr,900gr

19. Cho biết tên sữa, đơn giá, thành phần dinh dưỡng của 10 sữa có đơn giá cao nhất -->


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
$query17 = "SELECT *
          FROM sua
          WHERE Trong_luong IN (180,200,900)
          ORDER BY Ten_sua ASC;";

$query18 = "SELECT *
          FROM sua
          WHERE Trong_luong NOT IN (400,800,900)
          ORDER BY Ten_sua ASC;";

$query19 = "SELECT Ten_sua, Don_gia, TP_Dinh_Duong
          FROM sua
          ORDER BY Don_gia DESC
          LIMIT 10;";

// 5. Thực thi truy vấn
$result17 = $conn->query($query17);
$result18 = $conn->query($query18);
$result19 = $conn->query($query19);

if (!$result17 || !$result18 || !$result19) {
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

    <h2>17. Sản phẩm sữa có trọng lượng là 180gr, 200gr hoặc 900 gr</h2>

    <table border="5">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
        </tr>

        <?php
        while ($row = $result17->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "</tr>";
        }
        ?>
        </tr>

    </table>

    <h2>18. Sản phẩm sữa có trọng lượng không là 400gr, 800gr, 900gr</h2>

    <table border="5">
        <tr>
            <th>Mã sữa</th>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
        </tr>

        <?php
        while ($row = $result18->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ma_sua"] . "</td>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "<td>" . $row["TP_Dinh_Duong"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>19. 10 sản phẩm sữa có đơn giá cao nhất</h2>

    <table border="5">
        <tr>

            <th>Tên sữa</th>
            <th>Đơn giá</th>
            <th>Thành phần dinh dưỡng</th>
        </tr>

        <?php
        while ($row = $result19->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
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