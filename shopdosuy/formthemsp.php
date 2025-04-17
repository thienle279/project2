<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BẢNH.2HAND</title>

    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

form {
    max-width: 650px;
    margin: 50px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="file"],
button[type="button"] {
    width: 98%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin-right: 2px;
}

button[type="button"] {
    background-color: #0097e6;
    color: #fff;
    border: #0097e6 solid;
    cursor: pointer;
    margin-left: 11px;

}

button[type="button"]:hover {
    background-color: #fff;
    color: #0097e6;
    border: #0097e6 solid;
    transition: color 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.86), border 0.45s cubic-bezier(0.785, 0.135, 0.15, 0.8);

}

input[type="file"] {
    cursor: pointer;
}

input[type="file"]::-webkit-file-upload-button {
    cursor: pointer;
}

input[type="hidden"] {
    display: none;
}

    </style>
</head>


<body>
   
<div>

    <form id="themsp" action="themctsp.php" method="post" enctype="multipart/form-data">
    <input type="text" id="ten" name="ten" placeholder="Tên sản phẩm"  >
    <input type="text" id="tinhtrang" name="tinhtrang" placeholder="Tình trạng">
    <input type="text" id="gia" name="gia"  placeholder="Giá bán">
    <input type="text" id="mota" name="mota" placeholder="Mô tả chi tiết"><br>
    <input type="file" id="imageFile0" name="imageFile0"><br>
    <input type="file" id="imageFile1" name="imageFile1"><br>
    <input type="file" id="imageFile2" name="imageFile2"><br>
    <input type="file" id="imageFile3" name="imageFile3"><br>
    <input type="file" id="imageFile4" name="imageFile4"><br>
    <input type="hidden" id="id_hidden0" name="id_hidden0">
    <input type="hidden" id="id_hidden1" name="id_hidden1">
    <input type="hidden" id="id_hidden2" name="id_hidden2">
    <input type="hidden" id="id_hidden3" name="id_hidden3">
    <input type="hidden" id="id_hidden4" name="id_hidden4">
    <button type="button" id="btnthemsp" name="btnthemsp" onclick="uploadImages()">Thêm Sản Phẩm</button>
    </form>
  
    </div>
    

    <script>
function uploadImages() {
    var fileInputs = [
        document.getElementById("imageFile0"),
        document.getElementById("imageFile1"),
        document.getElementById("imageFile2"),
        document.getElementById("imageFile3"),
        document.getElementById("imageFile4")
    ];

    var urlValues = {}; // Đối tượng để lưu trữ các giá trị URL tương ứng với chỉ mục

    var promises = fileInputs.map(function(fileInput, index) {
        return new Promise(function(resolve, reject) {
            if (fileInput.files.length > 0) { // Kiểm tra nếu có tệp được chọn
                var formData = new FormData();
                formData.append("image", fileInput.files[0]);

                fetch('https://api.imgbb.com/1/upload?key=4492cd17ce112885a8956a72bf05b2a3', {
                    method: 'POST',
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    var imageUrl = data.data.url;
                    urlValues[index] = imageUrl; 
                    resolve();
                })
                .catch(error => {
                    console.error('Lỗi khi tải ảnh lên:', error);
                    reject(error);
                });
            } else {
                resolve(); 
            }
        });
    });

    Promise.all(promises)
        .then(function() {
            var savePromises = [];
            for (var index in urlValues) {
                if (urlValues.hasOwnProperty(index)) {
                    var imageUrl = urlValues[index];
                    savePromises.push(saveImageToDatabase(index, imageUrl));
                }
            }
            
            return Promise.all(savePromises);
        })
        .then(function() {
            // Chỉ submit form nếu tất cả các ảnh đã được xử lý và lưu trữ vào cơ sở dữ liệu
            document.getElementById("themsp").submit();
        })
        .catch(function(error) {
            console.error('Lỗi:', error);
        });
}

function saveImageToDatabase(index, imageUrl) {
    return new Promise(function(resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "themctsp.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (this.readyState === XMLHttpRequest.DONE) {
                if (this.status === 200) {
                    console.log("Ảnh đã được lưu trữ vào cơ sở dữ liệu.");
                    document.getElementById("id_hidden" + index).value = imageUrl;
                    resolve();
                } else {
                    console.error("Lỗi khi lưu trữ ảnh vào cơ sở dữ liệu.");
                    reject("Lỗi khi lưu trữ ảnh vào cơ sở dữ liệu.");
                }
            }
        };
        xhr.send("idh=" + encodeURIComponent(imageUrl));
    });
}
</script>

</body>
</html>
