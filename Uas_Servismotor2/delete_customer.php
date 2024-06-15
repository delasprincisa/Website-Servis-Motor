<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Delete Customer - Servis Motor CRUD</title>
</head>
<body>
    <header>
        <h1>Delete Customer</h1>
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
    <form method="post" action="delete_customer_handler.php">
        ID: <input type="text" name="c_id"><br>
        <button type="submit">Delete Customer</button>
        <nav>
        <ul>
        <li><a href="create_customer.php">Create Customer</a></li>
        <li><a href="Update_customer.php">Update Customer</a></li>
        </ul>
        </nav>
        
    </form>
    <footer>
        <p>&copy; 2024 Servis Motor CRUD. All rights reserved.</p>
    </footer>
</body>
</html>
