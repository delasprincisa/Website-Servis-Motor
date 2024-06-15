<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Create Employee - Servis Motor CRUD</title>
</head>
<body>
    <header>
        <h1>Create Employee</h1>
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
    <form method="post" action="create_employee_handler.php" enctype="multipart/form-data">
        ID: <input type="text" name="e_id"><br>
        Nama: <input type="text" name="e_nama"><br>
        Alamat: <input type="text" name="e_alamat"><br>
        No Telepon: <input type="text" name="e_noTlp"><br>
        Gambar: <input type="file" name="e_gambar"><br>
        <button type="submit">Create Employee</button>
        <nav>
        <ul>
        <li><a href="delete_employee.php">Delete Employee</a></li>
        <li><a href="Update_employee.php">Update Employee</a></li>
        </ul>
        </nav>
    </form>
    <footer>
        <p>&copy; 2024 Servis Motor CRUD. All rights reserved.</p>
    </footer>
</body>
</html>
