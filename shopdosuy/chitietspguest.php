
<script>
        
        function hoi() {
            
            var result = confirm("Hãy Đăng Nhập Hoặc Đăng Ký Tài Khoản Mua Hàng.");
            if (result) {
                window.location.href = "formdangnhap.php";
                
            } else {
               
            }
           
            
        }
    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        .container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin: auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-images {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }
        .product-images img {
            max-width: 100%;
            max-height: 400px;
            object-fit: cover;
            margin-bottom: 20px;
            border-radius: 8px;
        }
        .product-info {
            flex: 1;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        .form-buttons {
            margin-top: 20px;
        }
        .buttongiohang {
            width: 400px;
            padding: 10px 15px;
            background-color: white;
            color: black;
            border: 2px solid black;
            cursor: pointer;
            margin-right: 10px;
            margin-top: 20px;
        }
        .buttonmuangay {
            width: 400px;
            padding: 10px 15px;
            background-color: white;
            color: black;
            border: 2px solid black;
            cursor: pointer;
            margin-right: 10px;
            margin-top: 20px;
        }
        .buttongiohang:hover {
            width: 400px;
            padding: 10px 15px;
            background-color: black;
            color: white;
            border: 2px solid white;
                        cursor: pointer;
            margin-right: 10px;
            margin-top: 20px;
            transition: all 0.5s ease;
        }
        .buttonmuangay:hover {
            width: 400px;
            padding: 10px 15px;
            background-color: black;
            color: white;
            border: 2px solid white;
                        cursor: pointer;
            margin-right: 10px;
            margin-top: 20px;
            transition: all 0.5s ease;
        }
        .menu1 {
  height: 90px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
}
    </style>
      <div class="minibanner">
Bảnh.2hand
        </div>
        <div class="menu1">
        <div class="danhmuc2">
            SẢN PHẨM
 </div>
            
        </div>
       <div class="line">

       </div>
</head>
<body>

<div class="container">
    <div class="product-images">
        <?php
        $host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

        $id = $_GET['id'];
        $sql = "SELECT * FROM sanpham WHERE id = '$id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            for ($i = 0; $i < 5; $i++) {
                if (!empty($row["hinhanh$i"])) {
                    echo "<a href='chitiethinhanh.php?hinhanh=hinhanh$i&id=" . $row['id'] . "'><img src='" . $row["hinhanh$i"] . "' alt='Hình ảnh sản phẩm'></a>";
                }
            }
        } else {
            echo "<p>Không có dữ liệu.</p>";
        }
        ?>
    </div>
    <div class="product-info">
        <?php
        if ($result->num_rows > 0) {
            
            echo "<div class='form-group'>";
echo "<label for='ten'>Tên sản phẩm:</label>";
echo "<p>". $row['ten'] . "</p>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='gia'>Giá bán:</label>";
echo "<p>". $row['gia'] . "</p>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='tinhtrang'>Tình trạng:</label>";
echo "<p>". $row['tinhtrang'] . "</p>";
echo "</div>";

echo "<div class='form-group'>";
echo "<label for='mota'>Mô tả:</label>";
echo "<p>". $row['mota'] . "</p>";
echo "</div>";

            
            
  
    echo "<button class='buttongiohang' type='button' onclick='hoi()' id='btnthemvaogiohang' name='btnthemvaogiohang'>Thêm Vào Giỏ Hàng</button>";
    

    echo "<button class='buttonmuangay' type='button' onclick='hoi()' id='btnmuahang' name='btnmuahang'>Mua Ngay</button>";
        }
        $conn->close();
        ?>
    </div>
    
</div>

<script>
function suasp() {
    document.getElementById("suasp").submit();
}

function xoasp() {
    var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
    if (result) {
        document.getElementById("xoasp").submit();
    }
}

window.addEventListener('pageshow', function(event) {
    if (event.persisted || localStorage.getItem('reload') === 'true') {
        localStorage.removeItem('reload');
        location.reload();
    }
});
</script>

</body>
</html>
