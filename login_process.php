<?php
session_start();
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE Admin_Name = '$username'"; // สมมุติว่ามีฟิลด์ชื่อ Username ในตาราง admin
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['Admin_Password'] == $password) { // ตรวจสอบรหัสผ่าน
            $_SESSION['admin_logged_in'] = true;
            header('Location: admin.php');
            exit;
        } else {
            echo "รหัสผ่านไม่ถูกต้อง";
        }
    } else {
        echo "ชื่อผู้ใช้ไม่ถูกต้อง";
    }
}
?>
