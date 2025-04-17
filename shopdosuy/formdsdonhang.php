<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <title>BẢNH.2HAND</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
        }

        .huy,
        .duyet {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .huy {
            margin-top: 10px;
            background-color: #fff;
            color: red;
            border: 2px solid red;
            width: 100px;
        }

        .huy:hover {
            background-color: red;
            color: #fff;
        }

        .duyet {
        
            background-color: #fff;
            color: red;
            border: 2px solid red;
            width: 100px;
        }

        .duyet:hover {
          background-color: red;
            color: #fff;
        }

        .order p {
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .body {
            max-width: 125px;
            margin: 0 auto;
        }

        .minibanner {
            height: 40px;
            width: 100%;
            background-color: #000000;
            color: white;
            font-family: 'Lato', sans-serif;
            font-weight: 700;
            letter-spacing: 3px;
            text-transform: uppercase;
            text-shadow: 4px 4px 6px rgba(0, 0, 0, 0.8),
                0 0 15px rgba(255, 255, 255, 0.9);
            font-size: 1.5rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .menu {
            margin-left: 620px;
  height: 90px;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  white-space: nowrap;
        }

        .danhmuc2 {
  background-color: white;
  color: black;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
    font-size: 30px;
text-align: center;
margin-right: 30px;
        }

        .line {
            background-color: black;
            width: 100%;
            height: 2px;
        }

        .sp {
            display: flex;
            flex-direction: column;
            gap: 20px;
            width: 100%;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .order {
            display: flex;
            flex-direction: column;
            border: 1px solid rgb(223, 220, 220);
            background-color: #f1f2f6;
            padding: 20px;
            gap: 20px;
        }

        .order-header,
        .order-footer {
            display: flex;
            justify-content: space-between;
        }

        .order-products {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .product {
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid #ccc;
            padding: 20px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
            width: 200px;
            position: relative;
            overflow: hidden;
        }

        .product img {
            padding: 5px;
            width: 180px;
            height: 250px;
            transition: transform 0.3s;
        }

        .product:hover {
            background-color: #f5f5f5;
            transform: translate(0, -5px);
            border: 2px solid black;
            text-align: center;
        }

        .order-actions {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .order-actions form {
            margin: 0;
        }

        .order-actions button {
            width: 100px;
            font-size: 16px;
            cursor: pointer;
        }
        .bigmenu{

            display: flex;

        }
        .menu-search{
            display: flex;
  justify-content: flex-end;
  position: absolute;
  right: 30px;  
  align-items: center;

        }
        .menu-search input{
            height: 100%;
width: 200px;
padding-left: 20px;
margin-right: 10px;
border: 1px solid #ccc;
border: none;
height: 36px;
background-color: rgb(240, 240, 240);


}
    </style>
</head>

<body>
    <header class="header">
        <div class="minibanner">
            Bảnh.2hand
        </div>
        <div class="bigmenu">


       
        <div class="menu">
            <div class="danhmuc2">
           LỊCH SỬ GIAO DỊCH
            </div>
            <div class="menu-search">
                <form id="tksp" action="formtkdh.php" method="post" >
                <input type="text" name="madonhang" placeholder="Tìm Kiếm..." class="menu-search input" />
                <button type="submit" id="btntksp" name="btntksp" style=" font-size: 25px;color:black; background-color: white; border: none; margin-left: 10px"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                </div>
        </div>
        </div>
        
        <div class="line"></div>
    </header>
    <main class="main">
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


            $sql = "SELECT tk.diachi, tk.sdt, tk.hoten, donhang1.madh, sp.hinhanh0, sp.ten, sp.gia, ctdonhang.idsp, donhang1.matk, donhang1.tgtao
                    FROM donhang1, ctdonhang, sanpham sp, taikhoan tk
                    WHERE donhang1.madh = ctdonhang.madh
                        AND donhang1.matk = tk.matk
                        AND ctdonhang.idsp = sp.id
                    ORDER BY donhang1.madh DESC ";
            $result = $conn->query($sql);
            $currentMadh = null;

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    if ($row['madh'] !== $currentMadh) {
                        if ($currentMadh !== null) {
                            echo "</div>"; 
                            echo "</div>"; 
                        }
                        echo "<div class='order'>";
                        echo "<div class='order-header'>";
                        echo "<div>";
                        echo "<p>Người Mua: " . $row["hoten"] . "</p>";
                        echo "<p>Số Điện Thoại: " . $row["sdt"] . "</p>";
                        echo "<p>Địa Chỉ: " . $row["diachi"] . "</p>";
                        echo "<p>Thời Gian Mua: " . date('H:i:s d/m/Y', strtotime($row["tgtao"])) . "</p>";
                        echo "</div>";
                        echo "<div class='order-actions'>";
                        echo "<form action='huydonhang.php' method='post'>";
                        echo "<input type='hidden' name='madhhidden2' value='" . $row['madh'] . "'>";
                        echo "<button class='huy' type='submit'>HỦY</button>";
                        $result2 = $conn->query("SELECT ctcd.idsp FROM ctdonhang ctcd WHERE ctcd.madh = '" . $row['madh'] . "'");
                        while ($row2 = $result2->fetch_assoc()) {
                            echo "<input type='hidden' name='idsphidden[]' value='" . $row2['idsp'] . "'>";
                        }
                        echo "</form>";
                        echo "<form action='xoadonhang.php' method='post'>";
                        echo "<input type='hidden' name='madhhidden2' value='" . $row['madh'] . "'>";
                        echo "<button class='duyet' type='submit'><i class='fa-regular fa-trash-can'></i></button>";
                        $result2 = $conn->query("SELECT ctcd.idsp FROM ctdonhang ctcd WHERE ctcd.madh = '" . $row['madh'] . "'");
                        while ($row2 = $result2->fetch_assoc()) {
                            echo "<input type='hidden' name='idsphidden[]' value='" . $row2['idsp'] . "'>";
                        }
                        echo "</form>";
                        echo "</div>"; 
                        echo "</div>"; 
                        echo "<div class='order-products'>";
                        $currentMadh = $row['madh'];
                    }

                    echo "<div class='product'>";
                    echo "<a href='chitietspduyet.php?id=" . $row['idsp'] . "'><img src='" . $row['hinhanh0'] . "' alt='Hình ảnh sản phẩm'></a>";
                    echo "<p>" . $row['ten'] . "</p>";
                    echo "<p>$" . $row['gia'] . "</p>";
                    echo "</div>";
                }
                echo "</div>"; 
                echo "</div>"; 
            } else {
                echo "Không có dữ liệu.";
            }

            $conn->close();
            ?>
        </div>
    </main>
    <footer class="footer"></footer>

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
