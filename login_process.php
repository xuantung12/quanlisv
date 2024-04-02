<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = ""; // Mật khẩu của bạn
$dbname = "mydatabase"; // Tên cơ sở dữ liệu

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy dữ liệu từ form đăng nhập
$username = $_POST['username'];
$password = $_POST['password'];

// Kiểm tra xem tài khoản tồn tại trong cơ sở dữ liệu hay không
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "Đăng nhập thành công!";
    include 'index.php';
} else {
    echo "Tên người dùng hoặc mật khẩu không chính xác!";
}

$conn->close();
?>
