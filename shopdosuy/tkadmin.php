<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


$sql = "SELECT * FROM taikhoan WHERE vaitro='admin'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<div class='form-container'>";
    echo "<h1>CHỈNH SỬA TÀI KHOẢN</h1>";
    
    while ($row = $result->fetch_assoc()) {
        echo "<form action='suatkadmin.php' method='post'>";
        echo "<div class='form-group'>";
        echo "<label for='username'>Username:</label>";
        echo "<input type='text' name='username' value='" . $row['username'] . "'><br>";
        echo "</div>";

        echo "<div class='form-group'>";
        echo "<label for='password'>Password:</label>";
        echo "<input type='text' name='matkhau' value='" . $row['pass'] . "'><br>";
        echo "</div>";

        echo "<button type='submit'>Sửa</button>";
        echo "</form>";
    }

    echo "<form action='guest.php' method='post'>";
    echo "<button type='submit'>Đăng xuất</button>";
    echo "</form>";
    echo "</div>";
} else {
    echo "<p>Không có dữ liệu.</p>";
}

$conn->close();
?>
<style>
    .form-container {
        font-family: Arial, sans-serif;

    background-color: #ffffff;
    padding: 60px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    width: 400px;
    margin: 0 auto;
}

.form-container h1 {
    text-align: center;
    font-size: 34px;
    margin-top: 0;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 5px 0;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #1e90ff;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button[type="submit"]:hover {
    background-color: #70a1ff;
}

</style>