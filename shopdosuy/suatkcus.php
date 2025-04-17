<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$matk = $_POST['matk'];
$hoten = $_POST['hoten'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];
$username = $_POST['Username'];
$pass = $_POST['pass'];
    if( !empty($hoten) && !empty($sdt) && !empty($diachi) && !empty($username) && !empty($pass)){
       

      $sql ="SELECT username, pass from taikhoan where username = '$username' and matk='$matk' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {  

      $sql = "UPDATE taikhoan
      SET hoten = '$hoten', sdt = '$sdt', diachi = '$diachi' , username = '$username', pass = '$pass'
      WHERE matk = '$matk' ";
  
     
      if($conn->query($sql)==true){
          echo "<script>
          alert('Chỉnh Sửa Thành Công');
          localStorage.setItem('reload', 'true');
          window.history.back();
        </script>";
  
      }else{
          echo "loi {$sql}".$conn->error;
      } 


     }else{
        echo "<script>
            alert('Tên Đăng Nhập Đã Tồn Tại');
           
            window.history.back();
          </script>";
        
    }
        
    }else {
        echo "<script>
        alert('Vui Lòng Nhập Đủ Thông Tin');
        localStorage.setItem('reload', 'true');
        window.history.back();
      </script>";
    }


?>