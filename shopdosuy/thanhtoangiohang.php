<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (isset($_POST['selected_products'])) {
        $selectedProducts = $_POST['selected_products'];
        
       
        $matk = $_POST['matkmuahidden'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $tgtao = date('Y-m-d H:i:s');
 
        $sql = "SELECT * FROM dhchoduyet, ctdhchoduyet
        WHERE dhchoduyet.madh=ctdhchoduyet.madh
        AND dhchoduyet.matk='$matk' AND ctdhchoduyet.idsp IN (" . implode(',', $selectedProducts) . ")";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            echo "<script>
            alert('Sản Phẩm Đã Có Trong Đơn Hàng.');
            window.history.back();
            </script>";
        } else {
            $sql = "INSERT INTO `dhchoduyet` (`matk`, `tgtao`) VALUES ('$matk', '$tgtao')";
            
            if ($conn->query($sql) === TRUE) {
                $selectSql = "SELECT `madh` FROM `dhchoduyet` WHERE `madh` = LAST_INSERT_ID()";
                $result = $conn->query($selectSql);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $madhchoduyet = $row['madh'];
                
                    foreach ($selectedProducts as $idsp) {
                        $sql = "INSERT INTO `ctdhchoduyet` (`madh`, `idsp`) VALUES ('$madhchoduyet', '$idsp')";
                        $conn->query($sql);
                    }
                    
                    $sql = "DELETE FROM `giohang` WHERE `matk` = '$matk' AND `idsp` IN (" . implode(',', $selectedProducts) . ")";
                    $conn->query($sql);
                    
                    echo "<script>
        alert('Đăng Ký Mua Thành Công');
        localStorage.setItem('reload', 'true');
        window.history.back();
      </script>";

                }
            } else {
                echo "Có lỗi xảy ra khi tạo đơn hàng. Vui lòng thử lại sau.";
            }
        }
       
    } else {
        echo "Vui lòng chọn ít nhất một sản phẩm để thanh toán.";
    }
}

$conn->close();
?>