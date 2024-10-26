<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิกผู้ดูแล</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>สมัครสมาชิกผู้ดูแล</h1>
    <nav>
        <a href="index.php">หน้าแรก</a>
        <a href="login.php">เข้าสู่ระบบผู้ดูแล</a>
    </nav>
</header>

<main>
    <h2>กรุณากรอกข้อมูลเพื่อสมัครสมาชิก</h2>
    <form action="register_admin_process.php" method="post">
        <label for="Admin_Name">ชื่อผู้ดูแล:</label>
        <input type="text" id="Admin_Name" name="Admin_Name" required>

        <label for="Admin_ID_Card">รหัสบัตรประชาชน:</label>
        <input type="text" id="Admin_ID_Card" name="Admin_ID_Card" required>

        <label for="Admin_Address">ที่อยู่:</label>
        <input type="text" id="Admin_Address" name="Admin_Address" required>

        <label for="Admin_Phone">หมายเลขโทรศัพท์:</label>
        <input type="text" id="Admin_Phone" name="Admin_Phone" required>

        <label for="Admin_Email">อีเมล:</label>
        <input type="email" id="Admin_Email" name="Admin_Email" required>

        <label for="Admin_Password">รหัสผ่าน:</label>
        <input type="password" id="Admin_Password" name="Admin_Password" required>

        <button type="submit">สมัครสมาชิก</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
</footer>

</body>
</html>
