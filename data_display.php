<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Data Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e7f3fe; /* สีพื้นหลังฟ้าอ่อน */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .menu {
            margin-bottom: 20px;
        }

        button {
            background-color: #007BFF; /* สีฟ้าสำหรับปุ่ม */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px; /* เพิ่มมุมโค้งให้กับปุ่ม */
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
            transition: background-color 0.3s; /* เพิ่มการเปลี่ยนสีเมื่อ hover */
        }

        button:hover {
            background-color: #0056b3; /* สีฟ้าสำหรับปุ่มเมื่อ hover */
        }

        .container {
            width: 80%;
            text-align: center;
            overflow-y: auto;
            max-height: 80vh;
            border-radius: 8px; /* เพิ่มมุมโค้งให้กับกล่องข้อมูล */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* เงา */
            background-color: white; /* สีพื้นหลังของกล่องข้อมูล */
            padding: 20px; /* เพิ่มช่องว่างรอบๆ */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
        }

        th, td {
            padding: 12px 15px; /* ปรับขนาด padding */
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #007BFF; /* สีฟ้าสำหรับหัวตาราง */
            color: white;
            font-size: 18px;
        }

        td {
            font-size: 16px;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9; /* สีพื้นหลังของแถวคู่ */
        }

        tr:hover {
            background-color: #e1f5fe; /* สีพื้นหลังเมื่อ hover แถว */
        }

        img {
            width: 100px;
            height: auto;
            border-radius: 5px; /* เพิ่มมุมโค้งให้กับรูปภาพ */
        }
    </style>
    <script>
        function showTable(tableId) {
            var tables = document.querySelectorAll('.table-container');
            tables.forEach(function(table) {
                table.style.display = 'none';
            });

            document.getElementById(tableId).style.display = 'block';
        }
    </script>
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

<div class="menu">
    <button onclick="showTable('orderTable')">Order Data</button>
    <button onclick="showTable('adminTable')">Admin Data</button>
    <button onclick="showTable('customerTable')">Customer Data</button>
    <button onclick="showTable('equipmentTable')">Equipment Data</button>
    <button onclick="showTable('joinTable')">Join Data</button>
</div>

<div class="container">

    <?php
    // ข้อมูลการเชื่อมต่อฐานข้อมูล
    $servername = "localhost";
    $username = "root";  // โดยทั่วไปจะใช้ "root"
    $password = "";      // โดยทั่วไปจะไม่มีรหัสผ่าน
    $dbname = "computercenter";  // ฐานข้อมูลที่คุณสร้าง

    // สร้างการเชื่อมต่อกับฐานข้อมูล
    $conn = new mysqli($servername, $username, $password, $dbname);

    // ตรวจสอบการเชื่อมต่อ
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>

    <!-- ตาราง Order -->
    <div id="orderTable" class="table-container">
        <h2>Order Data</h2>
        <?php
        $sql = "SELECT order_ID, Date, Customer_ID, Total_price, Equipment_Name, Product_code, Order_Quantity , Customer_Name FROM `order`"; // เพิ่ม Order_Quantity
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Customer ID</th>
                        <th>Total Price</th>
                        <th>Equipment Name</th>
                        <th>Product Code</th>
                        <th>Order Quantity</th> <!-- เพิ่มคอลัมน์ Order Quantity -->
                        <th>Customer Name</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['order_ID']}</td>
                        <td>{$row['Date']}</td>
                        <td>{$row['Customer_ID']}</td>
                        <td>{$row['Total_price']}</td>
                        <td>{$row['Equipment_Name']}</td>
                        <td>{$row['Product_code']}</td>
                        <td>{$row['Order_Quantity']}</td> <!-- แสดง Order Quantity -->
                        <td>{$row['Customer_Name']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>ไม่พบข้อมูล</p>"; // เปลี่ยนข้อความถ้าไม่มีข้อมูล
        }
        ?>
    </div>

    <!-- ตาราง Admin -->
    <div id="adminTable" class="table-container">
        <h2>Admin Data</h2>
        <?php
        $sql = "SELECT Admin_ID, Admin_Name, Admin_ID_Card, Admin_Address, Admin_Phone, Admin_Email FROM `admin`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Admin ID</th>
                        <th>Admin Name</th>
                        <th>Admin ID Card</th>
                        <th>Admin Address</th>
                        <th>Admin Phone</th>
                        <th>Admin Email</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Admin_ID']}</td>
                        <td>{$row['Admin_Name']}</td>
                        <td>{$row['Admin_ID_Card']}</td>
                        <td>{$row['Admin_Address']}</td>
                        <td>{$row['Admin_Phone']}</td>
                        <td>{$row['Admin_Email']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>ไม่พบข้อมูล</p>"; // เปลี่ยนข้อความถ้าไม่มีข้อมูล
        }
        ?>
    </div>

    <!-- ตาราง Customer -->
    <div id="customerTable" class="table-container">
        <h2>Customer Data</h2>
        <?php
        $sql = "SELECT Customer_ID, Customer_Name, Customer_Address, Customer_Phone, Customer_Email FROM `customer`"; // เพิ่ม Customer_Email
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Customer ID</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                        <th>Customer Phone</th>
                        <th>Customer Email</th> <!-- เพิ่มคอลัมน์ Customer Email -->
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Customer_ID']}</td>
                        <td>{$row['Customer_Name']}</td>
                        <td>{$row['Customer_Address']}</td>
                        <td>{$row['Customer_Phone']}</td>
                        <td>{$row['Customer_Email']}</td> <!-- แสดง Customer Email -->
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>ไม่พบข้อมูล</p>"; // เปลี่ยนข้อความถ้าไม่มีข้อมูล
        }
        ?>
    </div>

    <!-- ตาราง Equipment -->
    <div id="equipmentTable" class="table-container">
        <h2>Equipment Data</h2>
        <?php
        $sql = "SELECT Product_Code, Equipment_Name, Type, MFD, Weight, Feature, Trademark, Producer, Price, Stock, Picture FROM `equipment`";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Product Code</th>
                        <th>Equipment Name</th>
                        <th>Type</th>
                        <th>MFD</th>
                        <th>Weight</th>
                        <th>Feature</th>
                        <th>Trademark</th>
                        <th>Producer</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Picture</th> <!-- เพิ่มคอลัมน์สำหรับรูปภาพ -->
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['Product_Code']}</td>
                        <td>{$row['Equipment_Name']}</td>
                        <td>{$row['Type']}</td>
                        <td>{$row['MFD']}</td>
                        <td>{$row['Weight']}</td>
                        <td>{$row['Feature']}</td>
                        <td>{$row['Trademark']}</td>
                        <td>{$row['Producer']}</td>
                        <td>{$row['Price']}</td>
                        <td>{$row['Stock']}</td>
                        <td><img src='images/{$row['Picture']}' alt='Product Image'></td> <!-- แสดงรูปภาพ -->
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>ไม่พบข้อมูล</p>"; // เปลี่ยนข้อความถ้าไม่มีข้อมูล
        }
        ?>
    </div>

    <!-- ตาราง Join Data -->
    <div id="joinTable" class="table-container">
        <h2>Join Data</h2>
        <?php
        $sql = "SELECT o.order_ID, o.Date, o.Customer_ID, o.Total_price, e.Equipment_Name, e.Product_Code, o.Order_Quantity, c.Customer_Name ,c.Customer_Address
                FROM `order` o 
                JOIN `customer` c ON o.Customer_ID = c.Customer_ID 
                JOIN `equipment` e ON o.Product_code = e.Product_Code"; // ทำการ Join
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Order ID</th>
                        <th>Date</th>
                        <th>Customer ID</th>
                        <th>Total Price</th>
                        <th>Equipment Name</th>
                        <th>Product Code</th>
                        <th>Order Quantity</th>
                        <th>Customer Name</th>
                        <th>Customer Address</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['order_ID']}</td>
                        <td>{$row['Date']}</td>
                        <td>{$row['Customer_ID']}</td>
                        <td>{$row['Total_price']}</td>
                        <td>{$row['Equipment_Name']}</td>
                        <td>{$row['Product_Code']}</td>
                        <td>{$row['Order_Quantity']}</td>
                        <td>{$row['Customer_Name']}</td>
                         <td>{$row['Customer_Address']}</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>ไม่พบข้อมูล</p>"; // เปลี่ยนข้อความถ้าไม่มีข้อมูล
        }
        ?>
    </div>
</div>

<?php
$conn->close();
?>

</body>
</html>
