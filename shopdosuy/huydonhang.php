<?php
$idsphidden = isset($_POST['idsphidden']) ? $_POST['idsphidden'] : array();
if (isset($_POST['madhhidden2'])) {
    $host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

    $madh = $_POST['madhhidden2'];
    $sql = "DELETE FROM `ctdonhang` WHERE `madh` = '$madh'";
    if ($conn->query($sql) === true) {
        $sql = "DELETE FROM `donhang1` WHERE `madh` = '$madh'";
        if ($conn->query($sql) === true) {
            $sql = "UPDATE `sanpham` SET `trangthai` = 'conhang' where `id` IN ('" . implode("','", $idsphidden) . "') ;";
            if ($conn->query($sql) === true) {

                echo "<script>
                alert('Đã Hủy Đơn Hàng');
                localStorage.setItem('reload', 'true');
                window.history.back();
              </script>";
        
                
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }}
      else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>
