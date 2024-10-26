<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายการคำสั่งซื้อ</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>แผงควบคุมผู้ดูแล</h1>
    <nav>
        <a href="index.php">หน้าแรก</a>
        <a href="admin.php" class="button">ผู้ดูแล</a>
        <a href="logout.php">ออกจากระบบ</a>
    </nav>
</header>

<main>
    <h2>รายการคำสั่งซื้อ</h2>
    <table>
        <tr>
            <th>รหัสคำสั่งซื้อ</th>
            <th>วันที่</th>
            <th>ชื่อลูกค้า</th>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคารวม</th>
        </tr>
        <?php
        $sql = "SELECT order_ID, Date, Customer_Name, Product_code, Equipment_Name, Order_Quantity, Total_price FROM `order`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['order_ID']}</td>
                        <td>{$row['Date']}</td>
                        <td>{$row['Customer_Name']}</td>
                        <td>{$row['Product_code']}</td>
                        <td>{$row['Equipment_Name']}</td>
                        <td>{$row['Order_Quantity']}</td>
                        <td>{$row['Total_price']} บาท</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='7'>ไม่มีข้อมูลคำสั่งซื้อ</td></tr>";
        }
        ?>
    </table>

</main>

<footer>
    <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
</footer>

</body>
</html>
