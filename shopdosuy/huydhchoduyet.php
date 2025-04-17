<?php
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
    $sql = "DELETE FROM `ctdhchoduyet` WHERE `madh` = '$madh'";
    if ($conn->query($sql) === true) {
        $sql = "DELETE FROM `dhchoduyet` WHERE `madh` = '$madh'";
        if ($conn->query($sql) === true) {
        $conn->close();
        echo "<script>
        alert('Đã Hủy Đơn Hàng');
        localStorage.setItem('reload', 'true');
        window.history.back();
      </script>";}
      else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
?>
