<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Login</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="login-container">
        <h2>เข้าสู่ระบบลูกค้า</h2>
        <form action="customer_login_process.php" method="POST">
            <label for="email">อีเมล:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">รหัสผ่าน:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">เข้าสู่ระบบ</button>
        </form>
    </div>
</body>
</html>
