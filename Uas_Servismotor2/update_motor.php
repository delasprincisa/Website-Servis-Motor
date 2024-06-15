<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Update Motor</title>
</head>
<body>
    <header>
        <h1>Update Motor</h1>
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

    <h2>Update Motor</h2>

    <form method="post" action="update_motor.php">
        Masukkan Nomor Polisi Motor: <input type="text" name="m_noPol" required>
        <button type="submit">Cari Motor</button>
        <nav>
        <ul>
        <li><a href="Create_motor.php">Create Motor</a></li>
        <li><a href="Delete_motor.php">Delete Motor</a></li>
        </ul>
        </nav>
    </form>

    <?php
    include 'db_connection.php';

    // Proses pencarian dan update data motor
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil nilai m_noPol dari form
        $m_noPol = $_POST['m_noPol'];

        // Query untuk mengambil data motor berdasarkan m_noPol
        $sql = "SELECT * FROM motor WHERE m_noPol = ?";
        $stmt = $conn->prepare($sql);

        // Binding parameter untuk prepared statement
        $stmt->bind_param("s", $m_noPol_param);

        // Mengeksekusi statement
        $m_noPol_param = $m_noPol;
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form method="post" action="update_motor_handler.php">
                <input type="hidden" name="m_noPol" value="<?php echo $row['m_noPol']; ?>">
                ID Customer: <input type="text" name="c_id" value="<?php echo $row['c_id']; ?>" required><br>
                Brand: <input type="text" name="m_brand" value="<?php echo $row['m_brand']; ?>" required><br>
                Model: <input type="text" name="m_model" value="<?php echo $row['m_model']; ?>" required><br>
                Tahun Pembuatan: <input type="text" name="m_thnBuat" value="<?php echo $row['m_thnBuat']; ?>" required><br>
                <button type="submit">Update Motor</button>
            </form>
            <?php
        } else {
            echo "Motor dengan Nomor Polisi $m_noPol tidak ditemukan.";
        }

        // Tutup statement
        $stmt->close();
    }

    // Tutup koneksi database
    $conn->close();
    ?>

    <footer>
        <p>&copy; 2024 Servis Motor CRUD. All rights reserved.</p>
    </footer>
</body>
</html>
