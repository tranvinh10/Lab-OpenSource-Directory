<?php

include_once("config.php");

// 1. Mở kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// 2. Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection false! " . $conn->connect_error);
}

// 3. Thiết lập bộ mã tiếng Việt
$conn->set_charset("utf8");

echo "<b>Kết nối thành công</b><br>";

// 4. Chuẩn bị truy vấn
$query = "SELECT * FROM khach_hang";
$query_hd = "SELECT * FROM hoa_don";
$query_cthd = "SELECT * FROM ct_hoadon";

// 5. Thực thi truy vấn
$result = $conn->query($query);
$result_hd = $conn->query($query_hd);
$result_cthd = $conn->query($query_cthd);

// Kiểm tra truy vấn
if (!$result) {
    die("<b>Query false</b>");
}

$numfileds = $result->field_count;
$numrows = $result->num_rows;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý bán sữa</title>
</head>

<body>

    <table border="1">
        <tr>
            <td>Mã khách hàng</td>
            <td>Tên khách hàng</td>
            <td>Phái</td>
            <td>Địa chỉ</td>
            <td>Điện thoại</td>
            <td>Email</td>
        </tr>

        <?php

        if ($numrows != 0) {

            while ($kh = $result->fetch_array()) {

                while ($hd = $result_hd->fetch_array()) {

                    if ($hd["Ma_khach_hang"] == $kh["Ma_khach_hang"]) {

                        while ($ct = $result_cthd->fetch_array()) {

                            if ($ct["So_hoa_don"] == $hd["So_hoa_don"]) {

                                if ($ct["Ma_sua"] == "AB0001") {

                                    echo "<tr>";
                                    echo "<td>" . $kh["Ma_khach_hang"] . "</td>";
                                    echo "<td>" . $kh["Ten_khach_hang"] . "</td>";
                                    echo "<td>" . $kh["Phai"] . "</td>";
                                    echo "<td>" . $kh["Dia_chi"] . "</td>";
                                    echo "<td>" . $kh["Dien_thoai"] . "</td>";
                                    echo "<td>" . $kh["Email"] . "</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    }
                }

                // In thông tin khách hàng
                echo "<tr>";

                for ($i = 0; $i < $numfileds; $i++) {

                    // Xử lý giới tính
                    if ($i == 2) {

                        if ($kh[$i] == 0) {
                            echo "<td>Nam</td>";
                        } else {
                            echo "<td>Nữ</td>";
                        }
                    } else {
                        echo "<td>" . $kh[$i] . "</td>";
                    }
                }

                echo "</tr>";
            }
        }

        ?>

    </table>

</body>

</html>

<?php

// 6. Đóng kết nối
$conn->close();

?>