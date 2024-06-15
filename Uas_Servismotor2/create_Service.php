<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Create Detail Service - Servis Motor CRUD</title>
</head>
<body>
    <header>
        <h1>Create Detail Service</h1>
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

    <h2></h2>
    <form method="post" action="create_service_handler.php">
        ID Service: <input type="text" name="s_id"><br>
        Employee ID: <input type="text" name="e_id"><br>
        No Polisi: <input type="text" name="m_noPol"><br>
        Tanggal: <input type="date" name="s_tgl"><br>
        Layanan: <input type="text" name="s_layanan"><br>
        Biaya: <input type="number" name="s_biaya"><br>
        <button type="submit">Create Detail Service</button>
        <nav>
        <ul>
        <li><a href="delete_service.php">Delete Service</a></li>
        <li><a href="Update_service.php">Update Service</a></li>
        </ul>
        </nav>
    </form>
    <footer>
        <p>&copy; 2024 Servis Motor CRUD. All rights reserved.</p>
    </footer>
</body>
</html>
