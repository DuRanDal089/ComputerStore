<?php
include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Admin_Name = $_POST['Admin_Name'];
    $Admin_ID_Card = $_POST['Admin_ID_Card'];
    $Admin_Address = $_POST['Admin_Address'];
    $Admin_Phone = $_POST['Admin_Phone'];
    $Admin_Email = $_POST['Admin_Email'];
    $Admin_Password = $_POST['Admin_Password'];

    // SQL query to insert new admin
    $sql = "INSERT INTO admin (Admin_Name, Admin_ID_Card, Admin_Address, Admin_Phone, Admin_Email, Admin_Password) 
            VALUES ('$Admin_Name', '$Admin_ID_Card', '$Admin_Address', '$Admin_Phone', '$Admin_Email', '$Admin_Password')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>สมัครสมาชิกผู้ดูแลสำเร็จ! คุณจะถูกนำกลับไปยังหน้าแรกภายใน 3 วินาที...</p>";
        header("refresh:3; url=index.php");
    } else {
        echo "<p>เกิดข้อผิดพลาด: " . $conn->error . "</p>";
        echo "<a href='index.php'>กลับไปยังหน้าแรก</a>";
    }
}
$conn->close();
?>
