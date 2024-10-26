<?php
$servername = "localhost";
$username = "root";  // โดยทั่วไปจะใช้ "root"
$password = "";      // โดยทั่วไปจะไม่มีรหัสผ่าน
$dbname = "computercenter";  // ชื่อฐานข้อมูลของคุณ

// สร้างการเชื่อมต่อ
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
}
?>
