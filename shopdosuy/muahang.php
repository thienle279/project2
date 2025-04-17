<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


$idsp = $_POST['idspmuahidden'];
$matk = $_POST['matkmuahidden'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$tgtao = date('Y-m-d H:i:s');
$sql = "SELECT * FROM dhchoduyet, ctdhchoduyet
WHERE dhchoduyet.madh=ctdhchoduyet.madh
AND dhchoduyet.matk='$matk' AND ctdhchoduyet.idsp ='$idsp'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<script>
    alert('Sản Phẩm Đã Được Đăng Ký Trước Đó');
    window.history.back();
  </script>";



}else{  $sql ="INSERT INTO `dhchoduyet` ( `matk`, `tgtao`) VALUES('$matk', '$tgtao') ";
    if($conn->query($sql)==true){
        $selectSql = "SELECT `madh` FROM `dhchoduyet` WHERE `madh` = LAST_INSERT_ID()";
        $result = $conn->query($selectSql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $madhchoduyet = $row['madh'];
    
          
            $sql = "INSERT INTO `ctdhchoduyet` (`madh`, `idsp`) VALUES ('$madhchoduyet', '$idsp')";
            if ($conn->query($sql) === true) {
                echo "<script>
                alert('Đăng Ký Mua Thành Công');
              
                window.history.go(-2);
            </script>";
            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
        }
    }else{
        echo "loi {$sql}".$conn->error;
    } }

  

?>
