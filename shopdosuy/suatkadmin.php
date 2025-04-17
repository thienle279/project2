<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$username =$_POST['username'];
$pass = $_POST['matkhau'];
if( !empty($username) && !empty($pass) ){
        $sql = "UPDATE taikhoan
        SET username ='$username', pass ='$pass'
        WHERE vaitro='admin'";
    
       
        if($conn->query($sql)==true){
            echo "<script>
            alert('Chỉnh Sửa Thành Công');
            localStorage.setItem('reload', 'true');
            window.history.back();
          </script>";
    
        }else{
            echo "loi {$sql}".$conn->error;
        } 
     } else {
        echo "ban can nhap du tt";
    }


?>