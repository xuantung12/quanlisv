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

// Lấy dữ liệu từ form đăng ký
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu chưa
$sql_check_email = "SELECT * FROM users WHERE email = '$email'";
$result_check_email = $conn->query($sql_check_email);

if ($result_check_email->num_rows > 0) {
    // Email đã tồn tại trong cơ sở dữ liệu
    echo "<script>alert('Email đã tồn tại!');</script>";
    echo "<script>window.location.href = 'register.php';</script>";
    exit();
} else {
    // Email chưa tồn tại, tiếp tục thêm dữ liệu vào bảng users
    $sql_insert_user = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($sql_insert_user) === TRUE) {
        // Đăng ký thành công, chuyển hướng đến trang đăng nhập
        echo "<script>alert('Đăng ký thành công!');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
        exit();
    } else {
        echo "Lỗi: " . $sql_insert_user . "<br>" . $conn->error;
    }
}

$conn->close();
?>

