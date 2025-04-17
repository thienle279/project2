<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$hinhanh = $_GET['hinhanh'];
$id = $_GET['id'];
$sql = "SELECT `$hinhanh` as hinhanh FROM sanpham where id ='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<img src='" . $row['hinhanh'] . "' alt='Hình ảnh sản phẩm'><br>";
    }
} else {
    echo "Không có dữ liệu.";
}


$conn->close();
?>
