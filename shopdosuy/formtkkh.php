<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <header class="header">
    <div class="minibanner">
Bảnh.2Hand
        </div>
        <div class="menu1">
            
        <div class="danhmuc2">
TÀI KHOẢN KHÁCH HÀNG
            </div>
        </div>
        </div>
        <div class="line">

</div>
<div class="sp">
<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$sdt = $_POST['sdttk'];
if (!empty($sdt)) {
$sql = "SELECT * FROM taikhoan where vaitro = 'customer' and sdt LIKE '%" . $sdt . "%' order by matk desc ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='khachhang' >";
      
        echo "<form id='thongtinkh'>";
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Khách Hàng: ".$row['matk']."</p>"  ;
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Họ Tên: " . $row['hoten'] . "</p>";
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Số Điện Thoại: " . $row['sdt'] . "</p>";
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Trạng Thái: ". $row["trangthai"] . "</p>";
       
        echo "</form>";
        echo "<form action='chitietkh.php' method='Post'>";
        echo "<input type='hidden' name='matkhidden' value='" . $row['matk'] . "'>";
        echo "<button type='submit' style='font-size: 40px;color:black; background-color: white; border: none; margin-top: 15px'><i class='fa-solid fa-eye' ></i></button>";
        echo "</form>";
       
        echo "</div>";
        
        
    }
} else {
    echo "<script>
    alert('Khách Hàng Không Tồn Tại.');
    window.history.back();
 </script>";
 exit;
    
}
} else {
    echo "<script>
        alert('Hãy Nhập Thông Tin!');
        window.history.back();
     </script>";
     
}
?>

  <script>
        
        function themtk() {
            
            window.location.href = "formdangky.php";
        }
    </script>
</div>
</body>
</html>
<style>
    .menu1 {
  height: 90px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
 
}
</style>
