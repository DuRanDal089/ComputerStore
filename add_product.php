<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $picture = $_FILES['picture']['name'];
    $target = "images/" . basename($picture);

    $sql = "INSERT INTO equipment (Equipment_Name, Price, Picture) VALUES ('$name', '$price', '$picture')";

    if ($conn->query($sql) === TRUE && move_uploaded_file($_FILES['picture']['tmp_name'], $target)) {
        header('Location: admin.php');
        exit;
    } else {
        echo "เกิดข้อผิดพลาด: " . $conn->error;
    }
}
?>
