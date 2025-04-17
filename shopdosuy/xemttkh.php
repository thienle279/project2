<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        
        .sp {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .customer {
            margin-bottom: 20px;
        }
        
        .customer p {
            margin: 10px 0;
        }
        
        .customer input[type="text"] {
            width: calc(100% - 20px); /* Adjusted width to account for padding */
            padding: 8px;
            margin-bottom: 10px; /* Added margin bottom for spacing */
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
        }
        
        .customer button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px; /* Added margin between buttons */
        }
        
        .customer button:last-child {
            margin-right: 0; /* No margin for the last button */
        }
        
        .customer button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<script>
    
    function xoatk() {
            var result = confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
            if (result) {
                document.getElementById("formxoatk").submit();
                
            } else {
               
            }
        }
</script>
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



    $matk = $_POST['matkhiddenkh'];

    $sql = "SELECT * FROM taikhoan WHERE matk = '$matk'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='customer' >";
        echo"<form id='formtk' action='suatkcus.php' method='post'>";
        echo "<p> Khách Hàng: " . $row['matk'] . "</p>";
        echo "<p> Họ Tên: <input type='text'name= 'hoten' value='" . $row['hoten'] . "' ></p>";
        echo "<p> Số Điện Thoại: <input type='text' name='sdt' value='" . $row['sdt'] . "' ></p>";
        echo "<p> Địa Chỉ Nhận Hàng: <input type='text' name ='diachi' value='" . $row['diachi'] . "' ></p>";
        echo "<p> Username: <input type='text' name ='Username' value='" . $row['username'] . "' ></p>";
        echo "<p> Password:<input type='text' name ='pass' value='" . $row['pass'] . "' ></p>";
        echo "<input type ='hidden' name='matk' value='". $row["matk"] . "'";
        echo "<p> <button type='submit'> Chỉnh Sửa </button>";
        echo"</form>";
        
        echo "</div>";
        
    } else {
        echo "Không có dữ liệu.";
    }


$conn->close();
?>

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
