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
    if( !empty($hoten) && !empty($sdt) && !empty($diachi)){
       

        
        $sql = "UPDATE taikhoan
        SET hoten = '$hoten', sdt = '$sdt', diachi = '$diachi'
        WHERE matk = '$matk'";
    
       
        if($conn->query($sql)==true){
            echo "<script>
            alert('Chỉnh Sửa Thành Công');
            localStorage.setItem('reload', 'true');
            window.history.back();
          </script>";
    
        }else{
            echo "loi {$sql}".$conn->error;
        } 
    }else {
        echo "ban can nhap du tt";
    }


?>