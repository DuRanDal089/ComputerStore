<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Customer_Name = $_POST['Customer_Name'];
    $Customer_Address = $_POST['Customer_Address'];
    $Customer_Phone = $_POST['Customer_Phone'];
    $Customer_Email = $_POST['Customer_Email'];
    $customer_password = $_POST['customer_password'];

    $sql = "INSERT INTO customer (Customer_Name, Customer_Address, Customer_Phone, Customer_Email, customer_password) 
            VALUES ('$Customer_Name', '$Customer_Address', '$Customer_Phone', '$Customer_Email', '$customer_password')";

    if ($conn->query($sql) === TRUE) {
        // สมัครสมาชิกสำเร็จ
        echo "<p>สมัครสมาชิกสำเร็จ! คุณจะถูกนำกลับไปยังหน้าแรกภายใน 3 วินาที...</p>";
        // ใช้ header() เพื่อกลับไปยังหน้าแรกหลังจาก 3 วินาที
        header("refresh:3; url=index.php");
    } else {
        echo "<p>เกิดข้อผิดพลาด: " . $conn->error . "</p>";
        echo "<a href='index.php'>กลับไปยังหน้าแรก</a>";
    }
}
$conn->close();
?>
