<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BẢNH.2HAND</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }
    
    .container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    h2 {
      margin-bottom: 20px;
      text-align: center;
      margin-top: 2rem;
    }
    
    .input-group {
      margin-bottom: 20px;
    }
    
    .input-group label {
      display: block;
      margin-bottom: 5px;
    }
    
    .input-group input,
    .input-group textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }
    
    .input-group textarea {
      height: 100px;
    }
    
    button[type="submit"] {
      background-color: cornflowerblue ;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;  
    }
    
    button[type="submit"]:hover {
      background-color: white ;
  color: cornflowerblue;
  padding: 10px 20px;
  border: 1px solid cornflowerblue;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  transition: background-color 0.3s;    }
    
  
    .social-icons {
      display: flex;
      justify-content: flex-end;
    }
    
    .social-icons i {
      font-size: 24px;
      margin-left: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <form action="/submit_contact_form" method="post">
      <h2>LIÊN HỆ</h2>
      <div class="input-group">
        <label for="name">Họ và Tên:</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="input-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="message">Nội dung:</label>
        <textarea id="message" name="message" required></textarea>
      </div>
      <div class="social-icons">
        <i class='bx bxl-facebook-circle'></i>
        <i class='bx bxl-instagram-alt'></i>
      </div>
      <button type="submit">Gửi</button>
    </form>
  </div>
</body>
</html>
