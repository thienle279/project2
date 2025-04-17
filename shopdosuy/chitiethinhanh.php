<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "banh2hand";

$conn = new mysqli($host, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . $conn->connect_error);
}

$hinhanh = $_GET['hinhanh'];
$id = $_GET['id'];
$sql = "SELECT `$hinhanh` as hinhanh FROM sanpham where id ='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<img src='" . $row['hinhanh'] . "' alt='Hình ảnh sản phẩm'><br>";
    }
} else {
    echo "Không có dữ liệu.";
}

echo "<div>";
echo "<form action='suaanh2.php' id='suaanh' method='post' enctype='multipart/form-data'>";
echo " <input type='file' id='imageFile' name='imageFile'>";
echo " <input type='hidden' id='idhidden' name='idhidden' value='" .$id. "'>";
echo " <input type='hidden' id='anhhidden' name='anhhidden'>";
echo " <input type='hidden' id='hinhanhhidden' name='hinhanhhidden' value='".$hinhanh."'>";
echo " <button type='button' onclick='uploadImage()'>Đổi Ảnh</button>";
echo "</form>";
echo "</div>";
$conn->close();

?>

<script>
        function uploadImage() {

            var formData = new FormData();
            formData.append("image", document.getElementById("imageFile").files[0]);

            fetch('https://api.imgbb.com/1/upload?key=4492cd17ce112885a8956a72bf05b2a3', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
             
                var imageUrl = data.data.url;

           
                saveImageToDatabase(imageUrl);
            })
            .catch(error => {
                console.error('Lỗi:', error);
            });
           
        }

        function saveImageToDatabase(idh) {
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "suaanh2.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (this.readyState === XMLHttpRequest.DONE) {
            if (this.status === 200) {
                console.log("Ảnh đã được lưu trữ vào cơ sở dữ liệu.");
                
            
            
            document.getElementById("anhhidden").value = idh;
          
                document.getElementById("suaanh").submit();
                
            } else {
                
                console.error("Lỗi khi lưu trữ ảnh vào cơ sở dữ liệu.");
            }
        }
    };
    xhr.send("idh=" + idh);
}
       
    </script>
