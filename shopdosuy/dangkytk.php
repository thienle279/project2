<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


$username = $_POST['username'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
$hoten = $_POST['hoten'];
$sdt = $_POST['sdt'];
$diachi = $_POST['diachi'];
 $sql ="SELECT * FROM taikhoan where username='$username'";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 if ($result->num_rows > 0) {
    echo "Tên Tài Khoản Đã Tồn Tại";
}else{
    if( !empty($username) && !empty($pass) && !empty($pass2) && !empty($hoten) && !empty($sdt) && !empty($diachi)){
        if ( $pass == $pass2 ){
           

            

            $sql ="INSERT INTO `taikhoan` ( `username`, `pass`, `hoten`, `sdt`, `diachi`, `vaitro`, `trangthai`) VALUES('$username', '$pass', '$hoten', '$sdt', '$diachi', 'customer','on')";
           
            if($conn->query($sql)==true){
                echo "Them du lieu thanh cong";
            }else{
                echo "loi {$sql}".$conn->error;
            } 
        }else {
            echo "<script>
            alert('Tên Tài Khoản Đã Tồn Tại');
           
            window.history.back();
          </script>";
        }
       
    }else {
        echo "ban can nhap du tt";
    }
}

?>