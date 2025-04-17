<script>
        
        function hoi() {
            
            var result = confirm("Bạn Có Chắc Muốn Đăng Xuất?");
            if (result) {
                alert('Đã Đăng Xuất');
                window.location.href = "guest.php";
                
            } else {
               
            }
           
            
        }
    </script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

</head>

<body>
    <header class="header">
        <div class="minibanner">
Bảnh.2Hand
        </div>
        <div class="bigmenu">
        <div class="logo">
           <img src="images/BẢNH.2Hand.jpg" alt='Hình ảnh sản phẩm' >
           </div>
        <div class="menu">
            
            <div class="danhmuc">
            <?php
   $matk = $_GET['matk'];

   
   echo"<form id='dhchoduyet' action='dsdhchoduyetcus.php' method='post'>"; 
   echo "  <input type='hidden' id='mathiddencus' name='matkhiddencus' value='". $matk . "'>";
   echo " <button type='submit' >CHỜ DUYỆT</button>";
   echo "</form>";
        echo"<form id='xemdhdamua' action='formdsdhcus.php' method='post'>"; 
        echo "  <input type='hidden' id='mathiddencus' name='matkhiddencus' value='". $matk . "'>";
        echo " <button type='submit' >LỊCH SỬ MUA HÀNG</button>";
        echo "</form>";
        echo"<form id='lienhe' action='formlienhe.php' method='post'>"; 
        echo "<input type='hidden' id='mathiddencus' name='matkhiddencus' value='". $matk . "'>";
        echo "<button type='submit' >LIÊN HỆ</button>";
        echo "</form>";
       
  
   echo "<button type='button' onclick='hoi()'> ĐĂNG XUẤT</button>";
        ?>
            </div>
<div class="minimenu2">
           <div class="menu-search">
                <form id="tksp" action="formtkspcus.php" method="post" >
                <input type="hidden" name="mataikhoan" value="<?php echo $matk; ?>">
                <input type="text" name="tensp" placeholder="Tìm Kiếm..." class="menu-search input" />
                <button type="submit" id="btntksp" name="btntksp" style=" font-size: 25px;color:black; background-color: white; border: none; margin-left: 10px"><i class="fa-solid fa-magnifying-glass"></i></button>               
             </form>
                
        </div>
          



   <div class="taikhoan">
    <?php
    $matk = $_GET['matk'];
   echo"<form id='formxemttkh' action='xemttkh.php' method='post'>"; 
        echo "  <input type='hidden' id='matkhiddenkh' name='matkhiddenkh' value='". $matk . "'>";
        echo " <button type='submit' style=' font-size: 25px;color:black; background-color: white; border: none; margin-left: 25px'><i class='fa-solid fa-user'></i></button>";
        echo "</form>";

?>
   </div>
   <div class="giohang">
            <?php
            $matk = $_GET['matk'];
               echo"<form id='xemgiohang' action='formgiohang.php' method='post'>"; 
               echo "<input type='hidden' id='matkhidden' name='matkhidden' value='". $matk . "'>";
               echo "<button type='submit' id='btnxemgiohang' name='btnxemgiohang' style='font-size: 25px;color:black; background-color: white; border: none; margin-left: 30px'><i class='fa-solid fa-cart-shopping'></i></button>";
               echo "</form>";
            
            
            ?>
   </div>
</div>
        </div>
        </div>
        
        </div>
        <div class="banner">
            <img src="images/BANNER.jpg" alt="" >
        </div>

    </header>
    <main class="main">


    </main>

    <div class="sp1">
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


 

        $sql = "SELECT * FROM sanpham where trangthai != 'daban' ORDER BY id DESC";
        $result = $conn->query($sql);
        $matk = $_GET['matk'];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='product' >";
                echo "<a href='chitietspcus.php?id=" . $row['id'] . "&matk=" . $matk . "'><img src='" . $row['hinhanh0'] . "' alt='Hình ảnh sản phẩm' > </a>";
                echo "<p>" . $row['ten'] . "</p>";
                echo "<p>$" . $row['gia'] . "</p>";
                echo "</div>";
               
            }
        } else {
            echo "Không có dữ liệu.";
        }
     


        $conn->close();

        ?>


        <script>
            function redirectToDetail(productId) {
                window.location.href = "chitietspcus.php?id=" + productId;
            }
        </script>
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
<style>

.footer {
    margin-top: 5rem;
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
  color: #fff; 
  font-family: 'Lato', sans-serif;
  margin-right: 50rem;
  line-height: 200%;
}
.footer-content1{
    display: flex;
  justify-content: center;
  align-items: center;
  flex-wrap: wrap;
  background: f1f1f1;
  margin-left: 60rem;
  margin-top: -6rem;
}
.footer-info1{
  text-align: left;
  color: #fff; 
  font-family: 'Lato', sans-serif;
  margin-right: 20rem;
  line-height: 200%;
  white-space: nowrap; 
}

</style>
<footer class="footer">
        <div class="footer-content">
            <div class="footer-info">
                <p>Tên công ty: BẢNH.2HAND </p>
                <p>Địa chỉ: 186 BIS Đường 30/4, Ninh Kiều, TP.Cần Thơ</p>
                <p>Số điện thoại: 0898082709</p>
            </div>
        </div>

        <div class="footer-content1">
            <div class="footer-info1">
                <p>Cách thức mua hàng: </p>
                <p>Vì là sản phẩm second hand nê mỗi sản phẩm chỉ có một</p>
                <p>Khi đăng ký mua hàng thành công chúng mình sẽ liên hệ với bạn sớm nhất có thể</p>
                <p>Chúng mình sẽ ưu tiên cho những bạn đăng ký sớm hơn nhé.</p>
            </div>
        </div>
    </footer>
</html>
