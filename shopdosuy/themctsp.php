<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}




$ten = $_POST['ten'];
$gia = $_POST['gia'];
$tinhtrang = $_POST['tinhtrang'];
$mota = $_POST['mota'];
$anh0 = $_POST['id_hidden0'];
$anh1 = $_POST['id_hidden1'];
$anh2 = $_POST['id_hidden2'];
$anh3 = $_POST['id_hidden3'];
$anh4 = $_POST['id_hidden4'];

if (!empty($ten) && !empty($gia) && !empty($tinhtrang) && !empty($mota) && !empty($anh0) && !empty($anh1) && !empty($anh2) && !empty($anh3) && !empty($anh4)) {
    $sql = "INSERT INTO `sanpham` (`ten`, `gia`, `tinhtrang`, `mota`, `hinhanh0`, `hinhanh1`, `hinhanh2`, `hinhanh3`, `hinhanh4`, `trangthai`) VALUES ('$ten', '$gia', '$tinhtrang', '$mota', '$anh0', '$anh1', '$anh2', '$anh3', '$anh4', 'cohang')";
   
    if ($conn->query($sql) === true) {
        echo "<script>
        alert('Thêm Sản Phẩm Thành Công');
        localStorage.setItem('reload', 'true');
        window.history.go(-2);
        </script>";
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "<script>
    alert('Hãy Nhập Đủ Thông Tin');
    window.history.go(-1);
    </script>";
}

$conn->close();
?>