<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


$matkxoa = $_POST["matkxoa"];
$idspxoa = $_POST["idspxoahidden"];


$idspArray = explode(',', $idspxoa);


$sql = "DELETE FROM giohang WHERE matk = '$matkxoa' AND idsp IN (" . implode(',', array_map('intval', $idspArray)) . ")";

if ($conn->query($sql) === true) {
    echo "<script>
    alert('Đã Xóa Khỏi Giỏ Hàng ');
    localStorage.setItem('reload', 'true');
    window.history.back();
  </script>";

} else {
    echo "Lỗi trong quá trình xóa dữ liệu: {$sql} " . $conn->error;
}

$conn->close();
?>