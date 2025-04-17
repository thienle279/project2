<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://unpkg.com/boxicons@latest/css/boxicons.min.css"
    />

<style>
    .customer {
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3); 
    font-family: 'Lato', sans-serif;
}

    .customer:hover {
    border-color: #000000; 
}

    button.edit-button:hover {
        background-color: #f0f0f0; 
    }

    button.lock-button:hover {
        background-color: #f0f0f0; 
    }

</style>
</head>
<body>
<script>
    
    function xoatk() {
            var result = confirm("Bạn có chắc chắn muốn Khóa tài khoản này không?");
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



    $matk = $_POST['matkhidden'];

    $sql = "SELECT * FROM taikhoan WHERE matk = '$matk'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<div class='customer' style='border: 1px solid #EEEEEE;border-radius: 20px;width: 480px;;height:70vh;margin-left: 33rem;margin-top: 0.8rem' >";
        echo"<form id='formtk' action='suatk.php' method='post'>";
        echo "<p style='font-weight: bold; margin-left: 7rem; margin-top: 1.5rem;font-size: 18px'> THÔNG TIN KHÁCH HÀNG</p>";
        echo "<p style=' margin-top: 0.8rem; margin-left: 3rem;font-size: 18px'> Khách Hàng: " . $row['matk'] . "</p>";
        echo "<p style='margin-left: 3rem;font-size: 18px'> Họ Tên: <input type='text'name= 'hoten' value='" . $row['hoten'] . "'style='border: 1px solid #CCCCCC; padding: 6px; width: 200px;margin-left: 7rem;margin-top: 0.8rem' ></p>";
        echo "<p style='margin-left: 3rem;font-size: 18px'> Số Điện Thoại: <input type='text' name='sdt' value='" . $row['sdt'] . "'style='border: 1px solid #CCCCCC; padding: 6px; margin-left: 3.8rem;width: 200px;margin-top: 0.8rem' ></p>";
        echo "<p style='margin-left: 3rem;font-size: 18px'> Địa Chỉ Nhận Hàng: <input type='text' name ='diachi' value='" . $row['diachi'] . "' style='border: 1px solid #CCCCCC; padding: 6px; margin-left: 1.4rem;width: 200px;margin-top: 0.8rem'></p>";
       
       
        echo "<p style='margin-top: 1rem;margin-left: 3rem;font-size: 18px'> Trạng Thái: ". $row["trangthai"] . "</p>";
        echo "<input type ='hidden' name='matk' value='". $row["matk"] . "'";
        echo "<p> <button type='submit' style='font-size: 30px; padding: 8px; margin-left: 11rem; border: none; background: white; position: relative; top: 19px;'><i class='fa-solid fa-pen-to-square'></i></button>";
        echo "</form>";
        echo "<form id='formxoatk' action='xoatk.php' method='post'>";
        echo "<input type='hidden' id='matkxoahidden' name='matkxoahidden' value='" . $row["matk"] . "'>";
        echo "<p> <button type='button' onclick='xoatk()' style='font-size: 35px; padding: 8px; margin-left: 15rem; position: relative; top: -30px; border: none; background: white; color:red;'> <i class='bx bx-lock-alt'></i> </button>";
                echo"</form";
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