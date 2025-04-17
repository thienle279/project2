<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

if (isset($_POST['username']) && ($_POST['pass'])) {
$username = $_POST['username'];
$pass = $_POST['pass'];
if( !empty($username) && !empty($pass)){
    echo "<pre>";
    print_r($_POST);
   

    $sql ="SELECT username, pass from taikhoan where username = '$username' and pass ='$pass' ";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $sql ="SELECT username, pass from taikhoan where username = '$username' and pass ='$pass' and trangthai='on' ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        $sql ="SELECT username, pass from taikhoan where username = '$username' and pass ='$pass' and vaitro = 'admin'  ";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            header("Location: admin.php");
        }
        $sql ="SELECT username, pass, matk from taikhoan where username = '$username' and pass ='$pass' and vaitro = 'customer' ";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    $matk = $row['matk'];
        if ($result->num_rows > 0) {
            header("Location: customer.php?matk=" . $matk);        }
        }else{
            echo "<script>
            alert('Tài Khoản Của Bạn Đã Bị Khóa ');
           
            window.history.back();
          </script>";
        }

    }else{
        echo "<script>
            alert('Tên Đăng Nhập Hoặc Mật Khẩu Không Đúng');
           
            window.history.back();
          </script>";
        
    }
}else{
    echo "<script>
    alert('Hãy Điển Đầy Đủ Thông Tin ');
   
    window.history.back();
  </script>";
} 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 70vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
        }
        #dangnhap {
            background-color: #ffffff;
            padding: 60px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            height: 300px;
        }
        #dangnhap input[type="text"],
        #dangnhap input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            margin-left: 0.1rem;
            border: 3px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 400px;
        }
        #dangnhap button {
            width: 100%;
            padding: 10px;
            background-color: #1e90ff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        #dangnhap button:hover {
            background-color: #70a1ff;
        }
        .dk{
        top: -10px;
        text-decoration: underline; 
        }
        
    </style>
</head>
<body>
    
<form id="dangnhap" action="formdangnhap.php" method="post">
    
<a href="formdangky.php" class="dk" style="margin-left: 21rem;margin-top: -4rem; font-size: 13px;color:#AAAAAA">ĐĂNG KÝ</a>
   <b> <p style="text-align: center;font-size: 34px; margin-top: 2rem">ĐĂNG NHẬP</p></b>
<input type="text" id="username" name="username" placeholder="Tên đăng nhập"></i>
<input type="password" id="pass" name="pass" placeholder="Mật khẩu"><br>
<button type="submit">Đăng nhập</button>

</body>
</html>