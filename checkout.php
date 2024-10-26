<?php
include 'db_connection.php';
session_start();

// ตรวจสอบว่ามี session สำหรับ cart และ customer_logged_in หรือไม่
if (!isset($_SESSION['cart']) || !isset($_SESSION['customer_logged_in'])) {
    header("Location: product_list.php");
    exit();
}

// คำนวณราคาสินค้าทั้งหมด
$total_price = 0;
foreach ($_SESSION['cart'] as $product_code => $quantity) {
    $sql = "SELECT Price, Equipment_Name FROM equipment WHERE Product_Code = '$product_code'";
    $result = $conn->query($sql);
    if ($result && $row = $result->fetch_assoc()) {
        $total_price += $row['Price'] * $quantity;
        $equipment_name = $row['Equipment_Name'];
    }
}

// ดึงข้อมูลลูกค้าจาก session
$customer_id = $_SESSION['customer_id'];
$customer_name = $_SESSION['customer_name'];
$order_date = date('Y-m-d');

// บันทึกคำสั่งซื้อในตาราง order
$sql = "INSERT INTO `order` (Date, Customer_ID, Total_price, Equipment_Name, Product_code, Order_Quantity, Customer_Name)
        VALUES ('$order_date', '$customer_id', '$total_price', '$equipment_name', '$product_code', '$quantity', '$customer_name')";

if ($conn->query($sql) === TRUE) {
    echo "<p>บันทึกคำสั่งซื้อเรียบร้อยแล้ว</p>";
    unset($_SESSION['cart']); // ล้างตะกร้าหลังการสั่งซื้อ
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การสั่งซื้อเสร็จสมบูรณ์</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>การสั่งซื้อเสร็จสมบูรณ์</h1>
        <nav>
            <a href="product_list.php">กลับไปที่หน้ารายการสินค้า</a>
        </nav>
    </header>
    <main>
        <p>ขอบคุณสำหรับการสั่งซื้อของคุณ!</p>
    </main>
    <footer>
        <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
    </footer>
</body>
</html>
