<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="info">Thêm Nhân Viên Mới</h1>
        <form action="add_data.php" method="post">
            <label for="ma_nv">Mã Nhân Viên:</label>
            <input type="text" id="ma_nv" name="ma_nv" required> <br><br>
            
            <label for="ten_nv">Tên Nhân Viên:</label>
            <input type="text" id="ten_nv" name="ten_nv" required><br><br>
            
            <label for="phai">Giới Tính:</label>
            <input type="text" id="phai" name="phai" required><br><br>
            
            <label for="noi_sinh">Nơi Sinh:</label>
            <input type="text" id="noi_sinh" name="noi_sinh" required><br><br>
            
            <label for="ma_phong">Mã Phòng:</label>
            <input type="text" id="ma_phong" name="ma_phong" required><br><br>
            
            <label for="luong">Lương:</label>
            <input type="text" id="luong" name="luong" required><br><br>
            
            <input type="submit" value="Thêm Nhân Viên">
        </form>
    </div>
</body>
</html>
