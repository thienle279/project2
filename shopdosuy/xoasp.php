<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}





$id = $_POST['idxoa'];

   
$sql = "DELETE FROM `sanpham` WHERE `id` = '$id'";
if($conn->query($sql) === true){
    echo "<script>
        alert('Đã Xóa Sản Phẩm');
        localStorage.setItem('reload', 'true');
        window.history.go(-2);
      </script>";

} else {
    echo "Lỗi trong quá trình xóa dữ liệu: {$sql}".$conn->error;
} 
?>
