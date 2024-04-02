<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí sinh viên</title>
    <link rel="stylesheet" href="styless.css">
</head>
<body>
    <div class="container">
        <h2>Quản lí sinh viên</h2>
        <form action="process.php" method="post">
            <input type="hidden" name="student_id" id="student_id">
            <input type="text" name="name" id="name" placeholder="Tên" required>
            <input type="text" name="class" id="class" placeholder="Lớp" required>
            <input type="text" name="gender" id="gender" placeholder="Giới tính" required>
            <input type="number" name="age" id="age" placeholder="Tuổi" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <button type="submit" name="add" id="add">Thêm sinh viên</button>
            <button type="submit" name="update" id="update" style="display:none;">Cập nhật sinh viên</button>
        </form>
        
        <h3>Danh sách sinh viên</h3>
        <div class="student-list">
            <?php include 'fetch.php'; ?>
        </div>
    </div>

    <script>
        function editStudent(id, name, class_name, gender, age, email) {
            document.getElementById('student_id').value = id;
            document.getElementById('name').value = name;
            document.getElementById('class').value = class_name;
            document.getElementById('gender').value = gender;
            document.getElementById('age').value = age;
            document.getElementById('email').value = email;

            document.getElementById('add').style.display = 'none';
            document.getElementById('update').style.display = 'block';
        }
    </script>
</body>
</html>
