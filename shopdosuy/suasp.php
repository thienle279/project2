<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

if(isset($_POST['suasp'])){
    echo "đã submit";
    
}
$id = $_POST['idhidden'];
    $ten = $_POST['ten'];
    $gia = $_POST['gia'];
    $tinhtrang = $_POST['tinhtrang'];
    $mota = $_POST['mota'];
  
    if( !empty($ten) && !empty($gia) && !empty($tinhtrang) && !empty($mota)){
        echo "<pre>";
        print_r($_POST);
        $sql = "UPDATE sanpham 
        SET ten = '$ten', gia = '$gia', tinhtrang = '$tinhtrang', mota = '$mota'
        WHERE id = '$id'";
    
       
        if($conn->query($sql)==true){
            echo "<script>
            alert('Sửa Sản Phẩm Thành Công');
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