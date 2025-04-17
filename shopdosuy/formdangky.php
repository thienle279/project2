<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #007BFF;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }
        button {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #007BFF;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <form id="dangkytk" action="dangkytk.php" method="post">
        <h2>ĐĂNG KÝ TÀI KHOẢN</h2>
        <input type="text" id="username" name="username" placeholder="Tên Đăng Nhập" required><br>
        <input type="password" id="pass" name="pass" placeholder="Mật Khẩu" required><br>
        <input type="password" id="pass2" name="pass2" placeholder="Nhập Lại Mật Khẩu" required><br>
        <input type="text" id="hoten" name="hoten" placeholder="Họ Và Tên" required><br>
        <input type="text" id="sdt" name="sdt" placeholder="Số Điện Thoại" required><br>
        <input type="text" id="diachi" name="diachi" placeholder="Địa Chỉ Nhận Hàng" required><br>
        <button type="submit" id="btndangky" name="btndangky">ĐĂNG KÝ</button>
    </form>
</body>
</html>
