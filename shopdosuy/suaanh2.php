<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}



$id = $_POST['idhidden'];
 $hinhanh = $_POST['hinhanhhidden'];
    $anh = $_POST['anhhidden'];
    if( !empty($anh)){
        echo "<pre>";
        print_r($_POST);
        $sql = "UPDATE sanpham SET `$hinhanh` = '$anh' WHERE id = '$id'";
        if($conn->query($sql)==true){
            echo "<script>
        alert('Sửa Ảnh Thành Công');
        localStorage.setItem('reload', 'true');
        window.history.go(-2);
      </script>";

        }else{
            echo "loi {$sql}".$conn->error;
        } 
    }else {
        echo "<script>
        alert('Hãy Chọn Hình Ảnh');
        localStorage.setItem('reload', 'true');
        window.history.back();
      </script>";

    }
?>
