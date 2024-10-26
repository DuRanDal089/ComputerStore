<?php
session_start();
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // ตรวจสอบการเชื่อมต่อฐานข้อมูล
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // เตรียม statement เพื่อป้องกัน SQL Injection
    $stmt = $conn->prepare("SELECT * FROM customer WHERE Customer_Email = ?");
    $stmt->bind_param("s", $email); // "s" หมายถึง string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // ตรวจสอบรหัสผ่านที่ได้รับเทียบกับรหัสผ่านในฐานข้อมูล
        if ($password == $row['customer_password']) {
            // ตั้งค่าสำหรับ session
            $_SESSION['customer_logged_in'] = true;
            $_SESSION['customer_id'] = $row['Customer_ID'];
            $_SESSION['customer_name'] = $row['Customer_Name'];
            
            header("Location: product_list.php");
            exit;
        } else {
            echo "<p>รหัสผ่านไม่ถูกต้อง</p>";
        }
    } else {
        echo "<p>อีเมลไม่ถูกต้อง</p>";
    }

    $stmt->close();
    $conn->close();
}
?>
