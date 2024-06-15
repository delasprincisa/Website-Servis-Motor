<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Update Detail Service</title>
</head>
<body>
    <header>
        <h1>Update Detail Service</h1>
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

    <h2>Update Data Detail Service</h2>

    <form method="post" action="update_service.php">
        Masukkan ID Service: <input type="text" name="s_id" required>
        <button type="submit">Cari</button>
        <nav>
        <ul>
        <li><a href="create_service.php">Create Service</a></li>
        <li><a href="Delete_service.php">Delete Service</a></li>
        </ul>
        </nav>
    </form>

    <?php
    include 'db_connection.php';

    // Proses pencarian dan update data detail service
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil nilai s_id dari form
        $s_id = $_POST['s_id'];

        // Query untuk mengambil data detail service berdasarkan s_id
        $sql = "SELECT * FROM dtlservice WHERE s_id = ?";
        $stmt = $conn->prepare($sql);

        // Binding parameter untuk prepared statement
        $stmt->bind_param("s", $s_id_param);

        // Mengeksekusi statement
        $s_id_param = $s_id;
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
        <div class = "dhikasepuh">
            <form method="post" action="update_service_handler.php">
                <input type="hidden" name="s_id" value="<?php echo $row['s_id']; ?>">
                <label for="e_id">ID Employee:</label><br>
                <input type="text" id="e_id" name="e_id" value="<?php echo $row['e_id']; ?>" required><br><br>
                <label for="m_noPol">Nomor Polisi Motor:</label><br>
                <input type="text" id="m_noPol" name="m_noPol" value="<?php echo $row['m_noPol']; ?>" required><br><br>
                <label for="s_tgl">Tanggal Service:</label><br>
                <input type="date" id="s_tgl" name="s_tgl" value="<?php echo $row['s_tgl']; ?>" required><br><br>
                <label for="s_layanan">Layanan:</label><br>
                <input type="text" id="s_layanan" name="s_layanan" value="<?php echo $row['s_layanan']; ?>" required><br><br>
                <label for="s_biaya">Biaya:</label><br>
                <input type="text" id="s_biaya" name="s_biaya" value="<?php echo $row['s_biaya']; ?>" required><br><br>
                <button type="submit">Update</button>
            </form>
        </div>
            <?php
        } else {
            echo "Detail Service dengan ID $s_id tidak ditemukan.";
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
