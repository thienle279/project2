<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<style>
    .order button[type='submit'] {
    display: flex; /* Đảm bảo nút chiếm toàn bộ chiều rộng của phần tử cha */
    margin: 0 auto; /* Đưa nút về giữa trang */
    background-color: #fff; /* Màu nền của nút */
    color: red; /* Màu chữ của nút */
    border: none; /* Loại bỏ viền của nút */
    padding: 10px 20px; /* Kích thước của nút */
    border-radius: 5px; /* Bo tròn các góc của nút */
    cursor: pointer; /* Hiển thị con trỏ khi di chuột qua nút */
    font-size: 16px; /* Cỡ chữ của nút */
    margin-top: 10px; /* Khoảng cách từ nút đến các phần tử trên */
    border: red solid;

}
.menu1 {
  height: 90px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
}
.order button[type='submit']:hover {
    background-color: #fff;
    color: white;
    border: red solid;
    background-color: red; /* Màu nền của nút */
    transition: color 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), border 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.8);
    
}
.order p {
    margin-top: 15px; /* Khoảng cách từ phía trên */
    margin-bottom: 15px; /* Khoảng cách từ phía dưới */
}
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.body{
    max-width: 125px;
    margin: 0 auto;
}
.minibanner{
    height: 40px;
    width: 100%;
    max-width: 100%;
background-color: #000000;
color: white;
font-family: 'Lato', sans-serif;
  font-weight: 700;
letter-spacing: 3px;
text-transform: uppercase;
text-shadow: 4px 4px 6px rgba(0,0,0,0.8), 
               0 0 15px rgba(255,255,255,0.9);
             font-size: 1.5rem;
             display: flex; 
  justify-content: center; 
  align-items: center; 
}
.menu {
  height: 90px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
}
.danhmuc2{

  background-color: white;
  color: black;
  font-family: 'Lato', sans-serif;
    font-weight: 700;
    font-size: 30px;
text-align: center;
}
.danhmuc {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: white;
  margin-right: 10px; /* Thêm khoảng cách */
}

.minimenu2 {
  display: flex;
  justify-content: flex-end;
  position: absolute;
  right: 30px;  
  align-items: center;

}

.line{

  background-color: black;
  width: 100%;
  height: 2px;
}

.minimenu {
  display: flex;
  justify-content: flex-end;
  position: absolute;
  right: 30px;
}
.logo{
    height: 90px;
    width: 90px;
    margin-left: -3rem;
background-color: white;

position: absolute;
  left: 45px;
}

.menu-search input{
height: 100%;
width: 200px;
padding-left: 20px;
margin-left: 20px;
border: 1px solid #ccc;
border: none;
height: 36px;
background-color: rgb(240, 240, 240);
}



.danhmuc button {
    flex: 1 0 25%;
    padding: 15px 25px;
    font-size: 18px;
    cursor: pointer;
    background-color: white;
    border-radius: 0px;
    color: #000000;
    border: 1px solid #000000;
    margin: 0 5px;
    font-weight: bold;
    transition: all 0.5s ease;
}

.danhmuc button:hover {
    color: #ffffff;
    background-color: #222222;
    border-color: #222222;
}



.banner img{
   
    width: 100%;
    height: 400px;
    
}
.banner{
    display: flex;
    width: 100%;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
}
.sp {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start;
    gap: 10px;
    margin-top: 20px;
    margin-bottom: 20px;
  }
  
  .product {
    flex: 0 0 calc(25% - 10px);
    border: 1px solid #ccc;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    height: 350px;
    position: relative;
    overflow: hidden;
    margin-left: 10px;
  }
  
  .product-text{
margin-top: 5px;
font-size: 15px;
font-family: Arial, sans-serif;
color: #333;
  }

  .product img {
    width: 100%;
    height: 90%;
 
    transition: transform 0.3s;
  }
  
  .product:hover {
    background-color: #f5f5f5;
    transform: translate(0, -5px);
    border: 2px solid black;
  }
  

  .khachhang {
    flex: 0 0 calc(25% - 10px);
    border: 2px solid #ccc;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.3s;
    height: 250px;
    position: relative;
    overflow: hidden;
    margin-left: 2px;
  }

  .khachhang:hover {
    background-color: white;
    transform: translate(0, -5px);
    border: 2px solid black;
  }
  
.customer {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
    cursor: pointer;
}
.productgh {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: left;
    cursor: pointer;
}
.order{
  border: 1px solid rgb(223, 220, 220);
  margin-left: 6rem;
  width: 300px;
 background-color: #f1f2f6;
}

/* style.css */
.footer {
  background-color: #000000;
  padding: 20px;
  text-align: center;
  border-top: 1px solid #e1e1e1;
}

.footer-content {
  display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  background: f1f1f1
}

.footer-info {
  text-align: left;
  color: #fff; /* Change this to your desired text color */
  font-family: 'Lato', sans-serif;
  margin-right: 50rem;
  line-height: 200%;
}

.footer-info p {
  margin: 5px 0;
  color: #fff; 
}
</style>
</head>

<body>
    <header class="header">
    <div class="minibanner">
Bảnh.2hand
        </div>
        <div class="menu1">
              
        <div class="danhmuc2">
LỊCH SỬ GIAO DỊCH

            </div>
           
            
        </div>
        <div class="line">

</div>
       
        

    </header>
    <main class="main">

      

    </main>

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


$madh = $_POST['madonhang'];
$sql = "SELECT tk.diachi, tk.sdt, tk.hoten, donhang1.madh, sp.hinhanh0, sp.ten, sp.gia, ctdonhang.idsp, donhang1.matk, donhang1.tgtao
FROM donhang1
JOIN ctdonhang ON donhang1.madh = ctdonhang.madh
JOIN sanpham sp ON ctdonhang.idsp = sp.id
JOIN taikhoan tk ON donhang1.matk = tk.matk
WHERE tk.sdt LIKE '%$madh%'
ORDER BY donhang1.madh DESC";
            
                    $result = $conn->query($sql);
                    $currentMadh = null;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            if ($row['madh'] !== $currentMadh) {
                             
                                echo "<div class='order'>";
                                echo "<p style='margin-left: 4rem;margin-top: 7px;font-size: 18px;'><b>Thông tin đơn hàng</b></p>";
                                echo "<p style='margin-left: 1rem; margin-top: 7px;'>Mã Đơn Hàng: " . $row['madh'] . "</p>";
                                echo "<p style='margin-left: 1rem;margin-top: 7px'>Người Mua: " . $row["hoten"] . "</p>";
                                echo "<p style='margin-left: 1rem;margin-top: 7px'>Số Điện Thoại: " . $row["sdt"] . "</p>";
                                echo "<p style='margin-left: 1rem;margin-top: 7px'>Địa Chỉ: " . $row["diachi"] . "</p>";
                                echo "<p style='margin-left: 1rem;margin-top: 7px'>Thời Gian Mua: " . $row["tgtao"] . "</p>";
                                   echo "<form action ='huydonhang.php' method='post'>";
                            echo "<input type='hidden' name='madhhidden2' value='" . $row['madh'] . "'>";
                            echo "<p><button type='submit' >Hủy đơn hàng</button></p>";
                            $result2 = $conn->query("SELECT ctcd.idsp FROM ctdonhang ctcd WHERE ctcd.madh = '" . $row['madh'] . "'");
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<input type='hidden' name='idsphidden[]' value='" . $row2['idsp'] . "'>";
                            }
                                echo "</form>";
                                echo "<form action ='xoadonhang.php' method='post'>";
                            echo "<input type='hidden' name='madhhidden2' value='" . $row['madh'] . "'>";
                            echo "<p><button type='submit' style='color: red; border: none; font-size: 25px;margin-left: 8rem;margin-top: 7px; '><i class='fa-regular fa-trash-can'></i></button></p>";
                            $result2 = $conn->query("SELECT ctcd.idsp FROM ctdonhang ctcd WHERE ctcd.madh = '" . $row['madh'] . "'");
                            while ($row2 = $result2->fetch_assoc()) {
                                echo "<input type='hidden' name='idsphidden[]' value='" . $row2['idsp'] . "'>";
                            }
                                echo "</form>";

                                echo "</div>";
                    
                                
                                $currentMadh = $row['madh'];
                            }
                           
                         

                            echo "<div class='product'>";
                            echo "<a href='chitietspduyet.php?id=" . $row['idsp'] . "'><img src='" . $row['hinhanh0'] . "' alt='Hình ảnh sản phẩm'></a>";
                            echo "<p>" . $row['ten'] . "</p>";
                            echo "<p>$" . $row['gia'] . "</p>";
                            echo "</div>";
                        }
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