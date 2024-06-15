<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title></title>
</head>
<body>
<header>
        <h1>Update Employee</h1>
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
    <h2></h2>

    <form method="post" action="update_employee.php" >
        Masukkan ID Employee: <input type="text" name="e_id" required>
        <button type="submit">Cari</button>
        <nav>
        <ul>
        <li><a href="Create_employee.php">Create Employee</a></li>
        <li><a href="Delete_employee.php">Delete Employee</a></li>
        </ul>
        </nav>
    </form>

    <?php
    include 'db_connection.php';

    // Proses pencarian dan update data karyawan
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Ambil nilai e_id dari form
        $e_id = $_POST['e_id'];

        // Query untuk mengambil data karyawan berdasarkan e_id
        $sql = "SELECT * FROM employee WHERE e_id = ?";
        $stmt = $conn->prepare($sql);

        // Binding parameter untuk prepared statement
        $stmt->bind_param("s", $e_id_param);

        // Mengeksekusi statement
        $e_id_param = $e_id;
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            ?>
            <form method="post"action="update_employee_handler.php" >
                <input type="hidden" name="e_id" value="<?php echo $row['e_id']; ?>">
                Nama: <input type="text" name="e_nama" value="<?php echo $row['e_nama']; ?>" required><br>
                Alamat: <input type="text" name="e_alamat" value="<?php echo $row['e_alamat']; ?>" required><br>
                No Telepon: <input type="text" name="e_noTlp" value="<?php echo $row['e_noTlp']; ?>" required><br>
                Gambar: <input type="file" name="e_gambar"><br>
                <button type="submit">Update</button>
            </form>
            <footer>
        <p>&copy; 2024 Servis Motor CRUD. All rights reserved.</p>
    </footer>
            <?php
        } else {
            echo "Karyawan dengan ID $e_id tidak ditemukan.";
        }

        // Tutup statement
        $stmt->close();
    }

    // Tutup koneksi database
    $conn->close();
    ?>

</body>
</html>
