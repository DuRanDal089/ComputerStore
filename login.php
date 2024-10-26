<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบผู้ดูแล</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>เข้าสู่ระบบผู้ดูแล</h1>
    <nav>
        <a href="index.php">หน้าแรก</a>
        <a href="register_admin.php">เพิ่มสมาชิก</a>
    </nav>
</header>

<main>
    <!-- บล็อกล็อกอินสี่เหลี่ยม -->
    <div class="login-container">
        <h2>กรุณาเข้าสู่ระบบ</h2>
        <form action="login_process.php" method="post">
        <label for="username">ชื่อผู้ใช้:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">เข้าสู่ระบบ</button>
        </form>
    </div>
</main>

<footer>
    <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
</footer>

</body>
</html>
