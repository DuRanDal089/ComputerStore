<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ร้านขายคอมพิวเตอร์</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>ร้านขายคอมพิวเตอร์</h1>
    <nav>
        <a href="product_list.php">สินค้า</a>
        <a href="login.php">เข้าสู่ระบบผู้ดูแล</a>
    </nav>
</header>

<main>
    <h2>ยินดีต้อนรับสู่ร้านขายคอมพิวเตอร์</h2>
    <p>คุณสามารถเลือกซื้อสินค้าที่คุณต้องการได้ที่นี่!</p>
    
    <h3>สมัครสมาชิกใหม่</h3>
    <form action="register_customer.php" method="post">
        <label for="name">ชื่อ:</label>
        <input type="text" id="name" name="Customer_Name" required>

        <label for="address">ที่อยู่:</label>
        <input type="text" id="address" name="Customer_Address" required>

        <label for="phone">เบอร์โทร:</label>
        <input type="text" id="phone" name="Customer_Phone" required>

        <label for="email">อีเมล:</label>
        <input type="email" id="email" name="Customer_Email" required>

        <label for="password">รหัสผ่าน:</label>
        <input type="password" id="password" name="customer_password" required>

        <button type="submit">สมัครสมาชิก</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
</footer>

</body>
</html>
