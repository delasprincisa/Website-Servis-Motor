<?php
include 'db_connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Data Table</title>
</head>
<body>

<header>
    <h1>Data Table</h1>
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

<div class="container">
    <?php
    $target_table = 'employee';
    function readTable($conn, $table) {
        $sql = "SELECT * FROM $table";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Data dari tabel $table</h2>";
            echo "<table border='1'><tr>";
            while ($field_info = $result->fetch_field()) {
                echo "<th>{$field_info->name}</th>";
            }
            echo "</tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $key => $value) {
                    if ($key == 'e_gambar') {
                        echo "<td><img src='" . $row['e_gambar'] . "' alt='" . $row['e_gambar'] . "' width='100' height='100'></td>";
                    } else {
                        echo "<td>$value</td>";
                    }
                }
                echo "</tr>";
            }
            
            echo "</table><br>";
        } else {
        }
    }

    $tables = ['customer', 'employee', 'motor', 'dtlservice'];
    foreach ($tables as $table) {
        readTable($conn, $table);
    }
    ?>

</div>
    <footer>
        <p>&copy; 2024 Servis Motor CRUD. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
$conn->close();
?>
