<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root"; // Thay username bằng tên người dùng của bạn
$password = ""; // Thay password bằng mật khẩu của bạn
$dbname = "students";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Xử lý thêm sinh viên
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $sql = "INSERT INTO student (name, class, gender, age, email)
            VALUES ('$name', '$class', '$gender', '$age', '$email')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Xử lý cập nhật sinh viên
if (isset($_POST['update'])) {
    $id = $_POST['student_id'];
    $name = $_POST['name'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $sql = "UPDATE student SET name='$name', class='$class', gender='$gender', age='$age', email='$email' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "bạn đã sửa thành công ";
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}
// Xử lý xóa sinh viên
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $sql = "DELETE FROM student WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Bạn đã xóa thành công";
        header("Location: index.php");
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . $conn->error;
    }
}

// Đóng kết nối
$conn->close();
?>
