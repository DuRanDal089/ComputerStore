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
    <title>แผงควบคุมผู้ดูแล</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>แผงควบคุมผู้ดูแล</h1>
    <nav>
        <a href="index.php">หน้าแรก</a>
        <a href="data_display.php">แสดงข้อมูล</a>
        <a href="logout.php">ออกจากระบบ</a>
    </nav>
</header>

<main>
    <h2>จัดการสินค้า</h2>
    <h3>เพิ่มสินค้า</h3>
    <form action="add_product.php" method="post" enctype="multipart/form-data">
        <label for="name">ชื่อสินค้า:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="price">ราคา:</label>
        <input type="number" id="price" name="price" required>
        
        <label for="picture">เลือกภาพ:</label>
        <input type="file" id="picture" name="picture" required>
        
        <button type="submit">เพิ่มสินค้า</button>
    </form>

    <h3>รายการสินค้า</h3>
    <table>
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>รูปภาพ</th>
        </tr>
        <?php
        $sql = "SELECT Product_Code, Equipment_Name, Price, Picture FROM equipment";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $imgTag = "<img src='images/{$row['Picture']}' alt='Product Image' style='width:100px; height:auto;'>";
                echo "<tr>
                        <td>{$row['Product_Code']}</td>
                        <td>{$row['Equipment_Name']}</td>
                        <td>{$row['Price']} บาท</td>
                        <td>{$imgTag}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='4'>ไม่มีข้อมูลสินค้า</td></tr>";
        }
        ?>
    </table>
</main>

<footer>
    <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
</footer>

</body>
</html>
