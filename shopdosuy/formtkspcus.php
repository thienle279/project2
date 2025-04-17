<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<header class="header">
<div class="minibanner">
Bảnh.2hand
        </div>
        <div class="menu1">
        <div class="danhmuc2">
            SẢN PHẨM
 </div>
           
            </div>
        </div>
          <div class="line">

       </div>


    </header>
    <main class="main">

        <div>
           
        </div>
    </main>
    <footer class="footer"></footer>

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

        $ten = $_POST['tensp'];
        $matk = $_POST['mataikhoan'];
        if( !empty($ten)){
       
        $sql = "SELECT * FROM sanpham WHERE ten LIKE '%" . $ten . "%' AND trangthai='cohang'
        ORDER BY id DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product' >";
                echo "<a href='chitietspcus.php?id=" . $row['id'] . "&matk=".$matk." '><img src='" . $row['hinhanh0'] . "' alt='Hình ảnh sản phẩm' > </a>";
                echo "<p>" . $row['ten'] . "</p>";
                echo "<p>$" . $row['gia'] . "</p>";
                echo "</div>";
            }
        } else {
            echo "Không có dữ liệu.";
        }
    }else{
        echo "<script>
        alert('Hãy Nhập Thông Tin!');
        window.history.back();
     </script>";
    }
        $conn->close();
        ?>

        <script>
            function redirectToDetail(productId) {
                window.location.href = "chitietsp.php?id=" + productId;
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