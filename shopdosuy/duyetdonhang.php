<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$madh = $_POST['madhhidden'];
$idsphidden = isset($_POST['idsphidden']) ? $_POST['idsphidden'] : array();
$matk = $_POST['matkhidden'];
date_default_timezone_set('Asia/Ho_Chi_Minh');
$tgtao = date('Y-m-d H:i:s');

$sql = "INSERT INTO `donhang1` (`matk`, `tgtao`) VALUES ('$matk', '$tgtao')";
if ($conn->query($sql) === true) {
    $madhchoduyet = $conn->insert_id;

    foreach ($idsphidden as $idsp) {
        $sql = "INSERT INTO `ctdonhang` (`madh`, `idsp`) VALUES ('$madhchoduyet', '$idsp')";
        if ($conn->query($sql) !== true) {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    }

    $sql = "DELETE FROM `ctdhchoduyet` WHERE `idsp` IN ('" . implode("','", $idsphidden) . "')";
    if ($conn->query($sql) === true) {
        $sql = "DELETE FROM `dhchoduyet` WHERE `madh` ='$madh'";
        if ($conn->query($sql) === true) {
            $sql = "DELETE FROM `giohang` WHERE `idsp` IN ('" . implode("','", $idsphidden) . "')";
            if ($conn->query($sql) === true) {

                $sql = "UPDATE `sanpham` SET `trangthai` = 'daban' where `id` IN ('" . implode("','", $idsphidden) . "') ;";
                if ($conn->query($sql) === true) {
                 
                        echo "<script>
                        alert('Đã Duyệt Đơn Hàng');
                        localStorage.setItem('reload', 'true');
                        window.history.back();
                      </script>";
                   
    
                } else {
                    echo "Lỗi: " . $sql . "<br>" . $conn->error;
                }


            } else {
                echo "Lỗi: " . $sql . "<br>" . $conn->error;
            }
          
        } else {
            echo "Lỗi: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Lỗi: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
