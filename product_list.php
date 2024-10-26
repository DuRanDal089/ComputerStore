<?php
include 'db_connection.php';
session_start();

// ตรวจสอบว่าลูกค้าเข้าสู่ระบบแล้วหรือไม่
if (!isset($_SESSION['customer_logged_in'])) {
    header("Location: customer_login.php");
    exit();
}

// ฟังก์ชันสำหรับเพิ่มสินค้าในตะกร้า
if (isset($_POST['add_to_cart'])) {
    $product_code = $_POST['product_code'];
    $quantity = (int)$_POST['quantity']; // แปลงให้เป็นจำนวนเต็ม

    // ตรวจสอบว่ามี session สำหรับ cart หรือไม่ ถ้าไม่มีให้สร้างใหม่
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // เพิ่มหรืออัปเดตสินค้าที่มีอยู่ในตะกร้า
    if (isset($_SESSION['cart'][$product_code])) {
        $_SESSION['cart'][$product_code] += $quantity; // เพิ่มจำนวนถ้ามีสินค้าอยู่แล้ว
    } else {
        $_SESSION['cart'][$product_code] = $quantity;
    }

    // แสดงข้อความยืนยันการเพิ่มสินค้า
    echo "<p>เพิ่มสินค้า '{$product_code}' ลงในตะกร้าเรียบร้อยแล้ว!</p>";
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการสินค้า</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>รายการสินค้า</h1>
    <nav>
        <a href="index.php">หน้าแรก</a>
        <a href="login.php">เข้าสู่ระบบผู้ดูแล</a>
        <a href="cart.php">ตะกร้าสินค้า</a> <!-- เพิ่มลิงก์ไปยังตะกร้าสินค้า -->
        <a href="logout.php">ออกจากระบบ</a>
    </nav>
</header>

<main>
    <h2>สินค้าในร้าน</h2>
    <table>
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ประเภท</th>
            <th>ราคา</th>
            <th>รูปภาพ</th>
            <th>เพิ่มลงตะกร้า</th>
        </tr>
        <?php
        // ดึงข้อมูลสินค้าจากตาราง equipment 
        $sql = "SELECT Product_Code, Equipment_Name, Type, Price, Picture FROM equipment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imgTag = "<img src='images/{$row['Picture']}' alt='Product Image' style='width:100px; height:auto;'>";
                echo "<tr>
                        <td>{$row['Product_Code']}</td>
                        <td>{$row['Equipment_Name']}</td>
                        <td>{$row['Type']}</td>
                        <td>{$row['Price']} บาท</td>
                        <td>{$imgTag}</td>
                        <td>
                            <form method='post' action=''>
                                <input type='hidden' name='product_code' value='{$row['Product_Code']}'>
                                <input type='number' name='quantity' value='1' min='1' style='width:50px;'>
                                <button type='submit' name='add_to_cart'>เพิ่มลงในตะกร้า</button>
                            </form>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='6'>ไม่มีข้อมูลสินค้า</td></tr>";
        }
        ?>
    </table>
</main>

<footer>
    <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
</footer>

</body>
</html>
