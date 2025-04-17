<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
            .menu1 {
  height: 90px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
}
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
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }
        button.delete {
            background-color: #dc3545;
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
            echo "<form id='suasp' action='suasp.php' method='post' enctype='multipart/form-data'>";
            echo "<div class='form-group'><label for='ten'>Tên sản phẩm:</label><input type='text' id='ten' name='ten' value='". $row['ten'] . "'></div>";
            echo "<div class='form-group'><label for='gia'>Giá bán:</label><input type='text' id='gia' name='gia' value='". $row['gia'] . "'></div>";
            echo "<div class='form-group'><label for='tinhtrang'>Tình trạng:</label><input type='text' id='tinhtrang' name='tinhtrang' value='". $row['tinhtrang'] . "'></div>";
            echo "<div class='form-group'><label for='mota'>Mô tả:</label><input type='text' id='mota' name='mota' value='". $row['mota'] . "'></div>";
            echo "<input type='hidden' id='idhidden' name='idhidden' value='". $row['id'] . "'>";
            echo "<div class='form-buttons'><button type='button' id='btnsuasp' name='btnsuasp' onclick='suasp()'>Chỉnh sửa</button></div>";
            echo "</form>";
            
            echo "<form id='xoasp' action='xoasp.php' method='post'>";
            echo "<input type='hidden' id='idxoa' name='idxoa' value='". $row['id'] . "'>";
            echo "<div class='form-buttons'><button type='button' class='delete' id='btnxoasp' name='btnxoasp' onclick='xoasp()'>Xóa sản phẩm</button></div>";
            echo "</form>";
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
