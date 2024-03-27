<?php
session_start();
    if (!isset($_SESSION["username"])) {
      header("Location: login.php");
      exit();
  }
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ql_nhansu";

    $limit = 5;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
    $start = ($page - 1) * $limit;
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT NhanVien.Ma_NV, NhanVien.Ten_NV, NhanVien.Phai, NhanVien.Noi_Sinh, PhongBan.Ten_Phong, NhanVien.Luong FROM NhanVien INNER JOIN PhongBan ON NhanVien.Ma_Phong = PhongBan.Ma_Phong LIMIT $start, $limit";
    $result = $conn->query($sql);
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1 class="info">THÔNG TIN NHÂN VIÊN </h1>
        <a href="add.php" class="add-button">Thêm nhân viên</a>
        <table border='1'>
            <tr class="first-column">
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Giới Tính</th>
                <th>Nơi Sinh</th>
                <th>Tên Phòng</th>
                <th>Lương</th>
            </tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $row["Ma_NV"]; ?></td>
                        <td><?php echo $row["Ten_NV"]; ?></td>
                        <td><img src="<?php echo ($row["Phai"] == 'NU') ? 'women.jpg' : 'man.png'; ?>" alt="<?php echo ($row["Phai"] == 'NU') ? 'Woman' : 'Man'; ?>" width="60" height="60"></td>                        
                        <td><?php echo $row["Noi_Sinh"]; ?></td>
                        <td><?php echo $row["Ten_Phong"]; ?></td>
                        <td class="red"><?php echo $row["Luong"]; ?></td>
                        <?php if ($_SESSION["role"] == "admin"): ?> 
                            <td>
                                <div class="edit-delete-wrapper">
                                    <a href="edit.php?id=<?php echo $row['Ma_NV']; ?>"><img src="fix.png" alt="Sửa" width="20" height="20"></a>
                                    <a href="delete.php?id=<?php echo $row['Ma_NV']; ?>"><img src="delete.png" alt="Xoá" width="20" height="20"></a>
                                </div>
                            </td>
                        <?php endif; ?>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan='6'>No Data</td></tr>
            <?php endif; ?>
        </table>

        <div class="pagination">
            <?php
            $sql_count = "SELECT COUNT(*) AS total FROM NhanVien";
            $result_count = $conn->query($sql_count);
            $row_count = $result_count->fetch_assoc();
            $total_pages = ceil($row_count["total"] / $limit);
            for ($i = 1; $i <= $total_pages; $i++) {
                echo "<a href='?page=$i'>$i</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>

<?php $conn->close(); ?>
