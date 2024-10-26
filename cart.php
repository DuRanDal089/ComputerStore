<?php
session_start();
include("db_connection.php");

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_to_cart'])) {
    $product_code = $_POST['product_code'];
    $quantity = $_POST['quantity'];

    // ตรวจสอบว่าสินค้าอยู่ในตะกร้าหรือไม่
    if (array_key_exists($product_code, $_SESSION['cart'])) {
        $_SESSION['cart'][$product_code] += $quantity; // เพิ่มจำนวน
    } else {
        $_SESSION['cart'][$product_code] = $quantity; // เพิ่มสินค้าใหม่
    }
}

// แสดงสินค้าที่อยู่ในตะกร้า
?>
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตะกร้าสินค้า</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<header>
    <h1>ตะกร้าสินค้า</h1>
</header>

<main>
    <table>
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>จำนวน</th>
            <th>ราคา</th>
            <th>รวม</th>
        </tr>
        <?php
        $total_amount = 0;
        foreach ($_SESSION['cart'] as $product_code => $quantity) {
            $sql = "SELECT Equipment_Name, Price FROM equipment WHERE Product_Code = '$product_code'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $item_total = $row['Price'] * $quantity;
                $total_amount += $item_total;
                echo "<tr>
                        <td>{$product_code}</td>
                        <td>{$row['Equipment_Name']}</td>
                        <td>{$quantity}</td>
                        <td>{$row['Price']} บาท</td>
                        <td>{$item_total} บาท</td>
                      </tr>";
            }
        }
        ?>
    </table>
    <h3>ยอดรวม: <?php echo $total_amount; ?> บาท</h3>
    <form action="checkout.php" method="POST">
        <button type="submit">ชำระเงิน</button>
    </form>
</main>

<footer>
    <p>&copy; 2024 ร้านขายคอมพิวเตอร์</p>
</footer>

</body>
</html>
