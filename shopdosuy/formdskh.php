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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>
    <header class="header">
    <div class="minibanner">
Bảnh.2Hand
        </div>
        <div class="menu1">
            
            <div class="danhmuc2">
TÀI KHOẢN KHÁCH HÀNG
            </div>
            <div class="minimenu">
            <div class="menu-search">
            <form id="tksp" action="formtkkh.php" method="post" >
                <input type="text" name="sdttk" placeholder="Tìm Kiếm..." class="menu-search input" />
                <button type="submit" id="btntksp" name="btntksp" style=" font-size: 25px;color:black; background-color: white; border: none; margin-left: 10px"> <i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            </div>
           
        </div>
        <div class="line">

</div>
      

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

$sql = "SELECT * FROM taikhoan where vaitro = 'customer' order by matk desc ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='khachhang' >";
      
        echo "<form id='thongtinkh'>";
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Khách Hàng: ".$row['matk']."</p>"  ;
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Họ Tên: " . $row['hoten'] . "</p>";
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Số Điện Thoại: " . $row['sdt'] . "</p>";
        echo "<p style='margin-left: 1rem;margin-top: 7px;font-size: 23px;'> Trạng Thái: ". $row["trangthai"] . "</p>";
       
        echo "</form>";
        echo "<form action='chitietkh.php' method='Post'>";
        echo "<input type='hidden' name='matkhidden' value='" . $row['matk'] . "'>";
        echo "<button type='submit' style='font-size: 40px;color:black; background-color: white; border: none; margin-top: 15px'><i class='fa-solid fa-eye' ></i></button>";
        echo "</form>";
       
        echo "</div>";
        
    }

} else {
    echo "Không có dữ liệu.";
}

?>

  <script>
        
        function themtk() {
            
            window.location.href = "formdangky.php";
        }
    </script>
    <script>
    window.addEventListener('pageshow', function(event) {
        if (event.persisted || localStorage.getItem('reload') === 'true') {
            localStorage.removeItem('reload');
            location.reload();
        }
    });
</script>

</div>
</body>
</html>
