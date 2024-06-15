<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Update Customer</title>
</head>
<body>
<header>
        <h1>Update Customer</h1>
        <nav>
            <ul>
            <li><a href="index.php">Home</a></li>
        <li><a href="read.php">Lihat Data</a></li>
        <li><a href="create_customer.php">Customer</a></li>
        <li><a href="create_employee.php">Employee</a></li>
        <li><a href="create_motor.php">Motor</a></li>
        <li><a href="create_service.php">Detail Service</a></li>
            </ul>
        </nav>
    </header>
    <footer>
        <p>&copy; 2024 Servis Motor CRUD. All rights reserved.</p>
    </footer>
    <h2>Update Customer</h2>

    <!-- Formulir untuk memasukkan ID Customer -->
    <form action="update_customer.php" method="post">
        Masukkan ID Customer: <input type="text" name="c_id" required>
        <button type="submit">Cari</button> 
        <nav>
        <ul>
        <li><a href="create_customer.php">Create Customer</a></li>
        <li><a href="Delete_customer.php">Delete Customer</a></li>
        </ul>
        </nav>
    </form>

    <?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['c_id'])) {
    $c_id = $_POST['c_id'];

    // Query untuk mengambil data customer berdasarkan c_id
    $sql = "SELECT * FROM customer WHERE c_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $c_id_param);
    $c_id_param = $c_id;
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <title>Update Customer</title>
        </head>
        <body>
            <h2>Update Customer</h2>

            <form action="update_customer_handler.php" method="post">
                <input type="hidden" name="c_id" value="<?php echo $row['c_id']; ?>">
                Nama: <input type="text" name="c_nama" value="<?php echo $row['c_nama']; ?>" required><br>
                Alamat: <input type="text" name="c_alamat" value="<?php echo $row['c_alamat']; ?>" required><br>
                No Telepon: <input type="text" name="c_noTlp" value="<?php echo $row['c_noTlp']; ?>" required><br>
                <button type="submit">Update Customer</button>            </form>

   
        <?php
    } else {
        header("Location: update_customer.php?status=error");
        exit();
    }

    $stmt->close();
}

$conn->close();
?>
     </body>
        </html>
