<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <?php
        // Kiểm tra nếu URL có chứa thông báo về việc đăng ký thành công
        if (isset($_GET['registered']) && $_GET['registered'] == 1) {
            echo '<div class="alert success">Bạn đã đăng ký thành công! Vui lòng đăng nhập.</div>';
        }
        ?>
        <form action="login_process.php" method="post">
            <div class="form-group">
                <label for="username">Tên người dùng:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Mật khẩu:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Đăng nhập</button>
            <div class="register"><a href="register.php">Đăng kí</a></div>
        </form>
    </div>
</body>
</html>
