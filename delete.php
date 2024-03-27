<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ql_nhansu";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $ma_nv = $_GET['id'];
    $sql = "DELETE FROM NhanVien WHERE Ma_NV='$ma_nv'";

    if ($conn->query($sql) === TRUE) {
        echo "Employee deleted successfully";
    } else {
        echo "Error deleting employee: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request";
}
?>