<?php
include 'db_connection.php';

// Create Employee
        $e_id = $_POST['e_id'];
        $e_nama = $_POST['e_nama'];
        $e_alamat = $_POST['e_alamat'];
        $e_noTlp = $_POST['e_noTlp'];
        $e_gambar = 'e_gambar/' . basename($_FILES['e_gambar']['name']);
        move_uploaded_file($_FILES['e_gambar']['tmp_name'], $e_gambar);

        $sql = "INSERT INTO employee (e_id, e_nama, e_alamat, e_noTlp, e_gambar) VALUES ('$e_id', '$e_nama', '$e_alamat', '$e_noTlp', '$e_gambar')";

        if ($conn->query($sql) === TRUE) {
            header('Location: create_employee.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

mysqli_close($conn);
?>
