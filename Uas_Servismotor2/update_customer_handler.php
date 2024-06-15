<?php
// Include file koneksi database
include 'db_connection.php';

// Pastikan request method adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $c_id = $_POST['c_id'];
        $c_nama = $_POST['c_nama'];
        $c_alamat = $_POST['c_alamat'];
        $c_noTlp = $_POST['c_noTlp'];

        $sql = "UPDATE customer SET c_nama='$c_nama', c_alamat='$c_alamat', c_noTlp='$c_noTlp' WHERE c_id='$c_id'";

        if ($conn->query($sql) === TRUE) {
            header('Location: read.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
// Tutup koneksi database
$conn->close();
?>
