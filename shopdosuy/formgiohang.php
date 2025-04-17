<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="minibanner">Bảnh.2hand</div>
    <div class="menu1">
        <div class="danhmuc2">GIỎ HÀNG</div>
    </div>
    <div class="line"></div>
    <div class="cart-actions">
        <?php
        $matk = $_POST['matkhidden'];
        echo "<form action='thanhtoangiohang.php' method='POST' style='display:inline;'>";
      
        echo "</form>";
        
        echo "<form id='xoagh' action='xoagiohang.php' method='POST' style='display:inline;'>";
        echo "<input type='hidden' id='idspxoahidden' name='idspxoahidden' value=''>";
        echo "<input type='hidden' id='matkxoa' name='matkxoa' value='$matk'>";
        echo "<button type='button' class='btn-remove' onclick='submitForm()'>Xóa khỏi giỏ hàng</button>";
        echo "</form>";
        ?>
    </div>
    <div class="cart-container">
        <?php
        $host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}


        $sql = "SELECT gh.matk, gh.idsp, sp.ten, sp.hinhanh0, sp.gia
                FROM giohang gh 
                JOIN sanpham sp ON gh.idsp = sp.id 
                JOIN taikhoan tk ON gh.matk = tk.matk 
                WHERE gh.matk ='$matk'
                AND sp.trangthai != 'daban'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<form action='thanhtoangiohang.php' method='POST'>";
            echo "<div class='cart-items'>";
            while ($row = $result->fetch_assoc()) {
                $idsp = $row['idsp'];
                echo "<div class='cart-item'>";
                echo "<div class='cart-item-image'>";
                echo "<a href='chitietspgh.php?id=" . $row['idsp'] . "&matk=" . $matk . "'>";
                echo "<img src='" . $row['hinhanh0'] . "' alt='Product Image'>";
                echo "</a>";
                echo "</div>";
                echo "<div class='cart-item-details'>";
                echo "<h3>" . $row['ten'] . "</h3>";
                echo "<p>$" . $row['gia'] . "</p>";
                echo "<div class='cart-item-actions'>";
                echo "<input type='checkbox' name='selected_products[]' value='$idsp' class='custom-checkbox'>";
               
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
            echo "<input type='hidden' id='matkmuahidden' name='matkmuahidden' value='$matk'>";
            echo "<button type='submit' class='btn-checkout'>Thanh toán</button>";
            echo "</form>";
        } else {
            echo "<div class='cart-empty'>Không có sản phẩm trong giỏ hàng.</div>";
        }

        $conn->close();
        ?>
    </div>

    <script>
        function submitForm() {
            var selectedProducts = document.querySelectorAll('input[name="selected_products[]"]:checked');
            var ids = [];
            selectedProducts.forEach(function(product) {
                ids.push(product.value);
            });
            document.getElementById('idspxoahidden').value = ids.join(',');
            document.getElementById('xoagh').submit();
        }

        window.addEventListener('pageshow', function(event) {
            if (event.persisted || localStorage.getItem('reload') === 'true') {
                localStorage.removeItem('reload');
                location.reload();
            }
        });
    </script>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .minibanner {
        height: 60px;
        background-color: #000;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        font-weight: bold;
    }

    .menu1 {
        height: 90px;
        background-color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        white-space: nowrap;
    }

    .danhmuc2 {
        font-size: 24px;
        font-weight: bold;
    }

    .line {
        height: 2px;
        background-color: #000;
        margin-top: 10px;
    }

    .cart-actions {
        display: flex;
        justify-content: flex-end;
        padding: 10px 20px;
        background-color: #fff;
        border-bottom: 1px solid #ccc;
    }

    .cart-container {
        padding: 40px;
        max-width: 1200px;
        margin: auto;
        position: relative;
    }

    .cart-items {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        grid-gap: 40px;
    }

    .cart-item {
        display: flex;
        align-items: center;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        padding: 20px;
        position: relative;
    }

    .cart-item-image {
        flex-basis: 30%;
        margin-right: 20px;
    }

    .cart-item-image img {
        max-width: 100%;
        height: auto;
        border-radius: 8px;
    }

    .cart-item-details {
        flex-basis: 70%;
    }

    .cart-item-details h3 {
        margin: 0;
        font-size: 18px;
        color: #333;
    }

    .cart-item-details p {
        margin: 10px 0;
        font-size: 16px;
        font-weight: bold;
        color: #333;
    }

    .cart-item-actions {
        position: absolute;
        right: 20px;
        top: 20px;
    }

    .cart-item-actions .custom-checkbox {
        transform: scale(1.5);
    }

    .btn-checkout,
    .btn-remove {
        background-color: #333;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .btn-checkout:hover {
        background-color: #555;
    }

    .btn-remove {
        background-color: #e74c3c;
    }

    .btn-remove:hover {
        background-color: #c0392b;
    }

    .cart-empty {
        text-align: center;
        font-size: 18px;
        color: #888;
        margin-top: 40px;
    }
</style>
