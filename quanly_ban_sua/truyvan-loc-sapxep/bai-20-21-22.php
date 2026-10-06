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

// 20. Cho biết 3 sản phẩm sữa của hãng Vinamilk 
// có trọng lượng nặng nhất, 
// gồm các thông tin: Tên sữa, trọng lượng

// 21. Liệt kê các sữa của hãng Vinamilk 
// gồm các thông tin: tên sữa, lợi ích, đơn giá, 
// trong đó đơn giá sắp giảm dần.

// 22. Liệt kê danh sách các sữa của hãng Abbott 
// có: tên sữa, trọng lượng, lợi ích, 
// trong đó trọng lượng sắp tăng dần. 

// 4. Chuẩn bị truy vấn
$query20 = "SELECT Ten_sua, Trong_luong
          FROM sua
          JOIN hang_sua ON sua.Ma_hang_sua = hang_sua.Ma_hang_sua
          WHERE Ten_hang_sua = 'Vinamilk'
          ORDER BY Trong_luong DESC
          LIMIT 3;";

$query21 = "SELECT Ten_sua, Loi_ich, Don_gia
          FROM sua
          JOIN hang_sua ON hang_sua.Ma_hang_sua = sua.Ma_hang_sua
          WHERE Ten_hang_sua = 'Vinamilk'
          ORDER BY Don_gia DESC;";

$query22 = "SELECT Ten_sua, Trong_luong, Loi_ich
          FROM sua
          JOIN hang_sua ON hang_sua.Ma_hang_sua = sua.Ma_hang_sua
          WHERE Ten_hang_sua = 'Abbott'
          ORDER BY Trong_luong ASC;";

// 5. Thực thi truy vấn
$result20 = $conn->query($query20);
$result21 = $conn->query($query21);
$result22 = $conn->query($query22);

if (!$result20 || !$result21 || !$result22) {
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

    <h2>20. 3 sản phẩm sữa của hãng Vinamilk có trọng lượng nặng nhất</h2>

    <table border="5">
        <tr>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
        </tr>

        <?php
        while ($row = $result20->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>21. Sữa của hãng Vinamilk theo thứ tự đơn giá giảm dần</h2>

    <table border="5">
        <tr>
            <th>Tên sữa</th>
            <th>Lợi ích</th>
            <th>Đơn giá</th>
        </tr>

        <?php
        while ($row = $result21->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
            echo "<td>" . $row["Don_gia"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <h2>22. Sữa của hãng Abbott theo thứ tự trọng lượng tăng dần</h2>

    <table border="5">
        <tr>
            <th>Tên sữa</th>
            <th>Trọng lượng</th>
            <th>Lợi ích</th>
        </tr>

        <?php
        while ($row = $result22->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_sua"] . "</td>";
            echo "<td>" . $row["Trong_luong"] . "</td>";
            echo "<td>" . $row["Loi_ich"] . "</td>";
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