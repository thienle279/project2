<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .customer-info {
            margin-bottom: 20px;
            
        }
        
        .customer-info p {
            margin: 10px 0;
        }
        
        .customer-info input[type="text"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        .customer-info button {
            padding: 10px 20px;
            background-color: white;
            color: #007bff;
            border: 1px solid #007bff;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
        }
        
        .customer-info button:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="customer-info">
        <?php
        $host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


        $matk = $_POST['matkmuahid'];
        $idsp = $_POST['idspmuahid'];
        $sql = "SELECT * FROM taikhoan WHERE matk = '$matk'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            echo "<form id='formtk' action='suatkcus.php' method='post'>";
            echo "<p> Khách Hàng: " . $row['matk'] . "</p>";
            echo "<p> Họ Tên: <input type='text' name='hoten' value='" . $row['hoten'] . "' ></p>";
            echo "<p> Số Điện Thoại: <input type='text' name='sdt' value='" . $row['sdt'] . "' ></p>";
            echo "<p> Địa Chỉ Nhận Hàng: <input type='text' name='diachi' value='" . $row['diachi'] . "' ></p>";
            echo "<input type='hidden' name='Username' value='". $row["username"] . "'>";
            echo "<input type='hidden' name='pass' value='". $row["pass"] . "'>";
            echo "<input type='hidden' name='matk' value='". $row["matk"] . "'>";
            echo "<button type='submit'> Chỉnh Sửa </button>";
            echo "</form>";

            echo "<form action='muahang.php' method='post'>";
            echo "<input type='hidden' name='matkmuahidden' value='" . $matk . "'>";        
            echo "<input type='hidden' name='idspmuahidden' value='" . $idsp . "'>";
            echo "<button type='submit'>Xác Nhận</button>";
            echo "</form>";
        } else {
            echo "Không có dữ liệu.";
        }

        $conn->close();
        ?>
    </div>
</div>

<script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted || localStorage.getItem('reload') === 'true') {
            localStorage.removeItem('reload');
            location.reload();
        }
    });
</script>

</body>
</html>
