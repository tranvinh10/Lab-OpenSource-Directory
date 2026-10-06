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

$query1 = "SELECT So_hoa_don, Tri_gia
FROM hoa_don;";
//2. Liệt kê danh sách các hóa đơn trong tháng 7 năm 2007 (dùng hàm day, month, year)
$query2 = "SELECT *
FROM hoa_don
WHERE MONTH(Ngay_HD) = 7 AND YEAR(Ngay_HD) = 2007";


$result1 = $conn->query($query1);
$result2 = $conn->query($query2);
if (!$result1 || !$result2) {
    die("Query false: " . $conn->error);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giá trị trung bình của các hóa đơn</title>
</head>

<body>

    <h2>1. Cho biết trị giá trung bình của các hóa đơn được làm tròn đến hàng nghìn.</h2>
    <table border="5">
        <tr>
            <th>Số hóa đơn</th>
            <th>Giá trị</th>
        </tr>

        <?php
        $count_hd = 0;
        $sum_hd = 0;
        while ($row = $result1->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["So_hoa_don"] . "</td>";
            echo "<td>" . $row["Tri_gia"] . "</td>";
            echo "</tr>";
            $count_hd++;
            $sum_hd += $row["Tri_gia"];
        }
        $avg_hd = ($count_hd > 0) ? round($sum_hd / $count_hd, -3) : 0;
        ?>

    </table>
    <h3>Giá trị trung bình của các hóa đơn: <?php echo $avg_hd; ?> (làm tròn đến hàng nghìn VNĐ)</h3>

    <h2>2. Liệt kê danh sách các hóa đơn trong tháng 7 năm 2007 (dùng hàm day, month, year)</h2>
    <table border="5">

        <tr>
            <th>Số hóa đơn</th>
            <th>Ngày hóa đơn</th>
            <th>Mã khách hàng</th>
            <th>Trị giá</th>
        </tr>
        <?php
        while ($row = $result2->fetch_array()) {
            echo "<tr>";
            echo "<td>" . $row["So_hoa_don"]  . "</td>";
            echo "<td>" . $row["Ngay_HD"]  . "</td>";
            echo "<td>" . $row["Ma_khach_hang"]  . "</td>";
            echo "<td>" . $row["Tri_gia"]  . "</td>";
            echo "</tr>";
        }
        ?>

    </table>


</body>

</html>