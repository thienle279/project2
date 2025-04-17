<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$idsp = $_POST['idsp'];
$matk = $_POST['matk'];

$sql = "SELECT `magh` FROM `giohang` WHERE `idsp` = '$idsp' and `matk` = '$matk'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<script>
    alert('Sản Phẩm Đã Có Trong Đơn Hàng.');
    window.history.back();
    
 </script>";
    }
 else {
    $sql ="INSERT INTO `giohang` ( `matk`, `idsp`) VALUES('$matk', '$idsp' )";

    if($conn->query($sql)==true){
        echo "<script>
        alert('Thêm Vào Giỏ Hàng Thành Công');
        window.history.back();
      
     </script>";
    }else{
        echo "loi {$sql}".$conn->error;
    } 
}



?>