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

// Lấy danh sách sinh viên
$sql = "SELECT * FROM student";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='student'>";
        echo "<strong>Tên:</strong> " . $row["name"] . "<br>";
        echo "<strong>Lớp:</strong> " . $row["class"] . "<br>";
        echo "<strong>Giới tính:</strong> " . $row["gender"] . "<br>";
        echo "<strong>Tuổi:</strong> " . $row["age"] . "<br>";
        echo "<strong>Email:</strong> " . $row["email"] . "<br>";
        echo "<button onclick=\"editStudent('" . $row["id"] . "', '" . $row["name"] . "', '" . $row["class"] . "', '" . $row["gender"] . "', '" . $row["age"] . "', '" . $row["email"] . "')\">Sửa</button>";
        echo "<a href='process.php?delete=" . $row["id"] . "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa sinh viên này không?\")'>Xóa</a>";
        echo "</div>";
    }
} else {
    echo "Không có sinh viên nào.";
}

// Đóng kết nối
$conn->close();
?>
