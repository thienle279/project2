<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$matk = $_POST['matkxoahidden'];

$sql = "SELECT * from taikhoan where matk = '$matk' and trangthai = 'on' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  $sql = "UPDATE taikhoan SET trangthai = 'off' WHERE matk = '$matk'";
  if($conn->query($sql) === true){
    echo "<script>
    alert('Đã Khóa Tài Khoản');
    localStorage.setItem('reload', 'true');
    window.history.go(-2);
   
  </script>";
  exit();
} else {
    echo "Lỗi trong quá trình xóa dữ liệu: {$sql}".$conn->error;
} 
}
  $sql = "SELECT * from taikhoan where matk = '$matk' and trangthai = 'off' ";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
 
    $sql = "UPDATE taikhoan SET trangthai = 'on' WHERE matk = '$matk'";
    if($conn->query($sql) === true){
      echo "<script>
      alert('Đã Mở Khóa Tài Khoản');
      localStorage.setItem('reload', 'true');
      window.history.go(-2);
    </script>";
    exit();
  } else {
      echo "Lỗi trong quá trình xóa dữ liệu: {$sql}".$conn->error;
  } 
}
?>
