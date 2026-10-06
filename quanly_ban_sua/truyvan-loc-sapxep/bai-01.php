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
$query = "SELECT Ten_hang_sua, Dia_chi, Dien_thoai
          FROM hang_sua";

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
    <title>Danh sách hãng sữa</title>
</head>

<body>

    <h2>Danh sách hãng sữa</h2>

    <table border="5">
        <tr>
            <th>Tên hãng sữa</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
        </tr>

        <?php
        while ($row = $result->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["Ten_hang_sua"] . "</td>";
            echo "<td>" . $row["Dia_chi"] . "</td>";
            echo "<td>" . $row["Dien_thoai"] . "</td>";
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